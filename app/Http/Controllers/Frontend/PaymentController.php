<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Cart;
use Session;
use App\Mail\invoiceMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\model\Frontend\Order;
use App\model\Frontend\Shipping;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\model\Frontend\Order_Details;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Payment page..
    public function index()
    {
        $cart = Cart::content();
        return view('frontend.pages.payment.payment_form', compact('cart'));
    }

    //Payment process
    public function process(Request $request)
    {
        //Validation
        $validation = $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'phone_number'  => 'required',
            'address'       => 'required',
            'city'          => 'required',
            'post_code'     => 'required',
            'payment'       => 'required',
        ]);

        $payment                 = array();
        $payment['name']         = $request->name;
        $payment['email']        = $request->email;
        $payment['phone_number'] = $request->phone_number;
        $payment['address']      = $request->address;
        $payment['city']         = $request->city;
        $payment['post_code']    = $request->post_code;
        $payment['payment']      = $request->payment;

        //Payment condition
        if ($request->payment == 'stripe') {
            $cartList = Cart::content();
            return view('frontend.pages.payment.stripe_payment', compact('cartList', 'payment'));
        }elseif($request->payment == 'paypal'){
            dd('Paypal Payment');
        }elseif($request->payment == 'ideal'){
            dd('Idel Payment');
        }else{
            dd('Checking');
        }

    }

    // Stripe Payment
    public function stripePayment(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51I8oIQKVek47RdpXfy1ZspwZDaCBDm4cKWxHNFBb2qOHNjuJEpTSsqwLwDJe2jsCJ7QlRMPWmugyNYQk2lkiqP1d00OqY8OcUW');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount'      => $request->total * 100,
            'currency'    => 'usd',
            'description' => 'One Tech Details',
            'source'      => $token,
            'metadata'    => ['order_id' => Str::random(20)],
        ]);
        // Insert Order Information..
        $order                   = new Order();
        $order->user_id          = Auth::id();
        $order->payment_id       = $charge->payment_method;
        $order->payment_type     = $request->payment_type;
        $order->payment_amount   = $charge->amount/100;
        $order->blnc_transection = $charge->balance_transaction;
        $order->strip_order_id   = $charge->metadata->order_id;
        $order->subtotal         = $request->sub_total;
        $order->shipping         = $request->shipping_charge;
        $order->vat              = $request->vat;
        $order->total            = $request->total;
        $order->status           = '0';
        $order->return_order     = '0';
        $order->status_code      = Str::random(7);
        $order->month            = date('m');
        $order->date             = date('d-m-Y');
        $order->year             = date('Y');

        DB::transaction(function () use ($request, $order){
            if ($order->save()) {
                $shipping                   = new Shipping();
                $shipping->order_id         = $order->id;
                $shipping->ship_name        = $request->ship_name;
                $shipping->ship_email       = $request->ship_email;
                $shipping->ship_phone       = $request->ship_phone;
                $shipping->ship_address     = $request->ship_address;
                $shipping->ship_city        = $request->ship_city;
                $shipping->ship_post_code   = $request->ship_post_code;
                $shipping->save();

                $cartContent = Cart::content();
                foreach ($cartContent as $row) {
                    $orderDetais                  = new Order_Details();
                    $orderDetais->order_id        = $order->id;
                    $orderDetais->product_id      = $row->id;
                    $orderDetais->product_name    = $row->name;
                    $orderDetais->color           = $row->options->color;
                    $orderDetais->size            = $row->options->size;
                    $orderDetais->qty             = $row->qty;
                    $orderDetais->single_price    = $row->price;
                    $orderDetais->total_price     = $row->price * $row->qty;
                    $orderDetais->save();
                }
            }
        });

        //mail send to user
        Mail::to($request->ship_email)->send(new invoiceMail($order));

        // Forget Existing Data..
        Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
        // Notification
        $notification=array(
            'messege'=>'Your Transactions Have Successful.',
            'alert-type'=>'success'
        );
        // Redirect
        return redirect()->to('/')->with($notification);
    }



}
