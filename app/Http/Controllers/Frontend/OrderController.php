<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\model\Frontend\Order;
use App\model\Frontend\Shipping;
use App\Http\Controllers\Controller;
use App\model\admin\Product;
use App\model\Frontend\Order_Details;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Single Order View
    public function singleOrder(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $shipping = Shipping::where('order_id', $id)->first();
        $order_details = Order_Details::where('order_id', $id)->get();
        return view('frontend.pages.order.single_order', compact('order','shipping','order_details'));
    }

    // Return Order
    public function returnOrder($id)
    {
        //Stock Manage
        $orders = Order_Details::where('order_id', $id)->get();
        foreach ($orders as $row) {
            $product = Product::where('id', $row->product_id)->first();
            $product->product_quantity = $product->product_quantity + $row->qty;
            $product->save();
        }
        //Order Return
        $orderReturn = Order::find($id);
        $orderReturn->return_order = 1;
        // Save Product Data...
        $orderReturn->save();
        // Notification...
        $notification=array(
            'messege'=>'Order Return Request done Please wait for Our Confirmation Email',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->route('home')->with($notification);
    }


}
