<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Cart;
use Session;
use App\model\admin\Cupon;
use App\model\admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddCartController extends Controller
{
    // Add To Card By Ajax..
    public function addtoCart($id)
    {
        $product    = Product::where('id', $id)->where('status', 1)->first();
            // Card Add
            if ($product->discount_price == null) {
                $data                     = array();
                $data['id']               = $product->id;
                $data['name']             = $product->product_name;
                $data['qty']              = 1;
                $data['price']            = $product->selling_price;
                $data['weight']           = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = "";
                $data['options']['size'] = "";
                Cart::add($data);
                // json
                return response()->json(['success' => 'Cart Added Successfully']);
            } else {
                $data                     = array();
                $data['id']               = $product->id;
                $data['name']             = $product->product_name;
                $data['qty']              = 1;
                $data['price']            = $product->discount_price;
                $data['weight']           = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['size'] = "";
                $data['options']['colour'] = "";
                Cart::add($data);
                // json
                return response()->json(['success' => 'cart Added Successfully']);
            }
    }

    // Add Product Cart By Route..
    public function addCart(Request $request)
    {
        $product = Product::findorfail($request->product_id);
        // Card Add
        $data                     = array();
        if ($product->discount_price == null) {
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);

            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
            );
            return Redirect()->to('/')->with($notification);
        } else {
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->discount_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);

            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
            );
            return Redirect()->to('/')->with($notification);
        }
                    
    }

    // Show Cart Product
    public function showCart(Request $request)
    {
        $cart = Cart::content();
        return view('frontend.pages.cart', compact('cart'));   
    }

    // Remove Cart
    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        // Notification...
        $notification=array(
            'messege'=>'Cart Remove Successfully.!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification); 
    }

    public function updateCart(Request $request, $id)
    {
        $rowId = $id;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        $notification=array(
            'messege'=>'Cart Update Successfully.!',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification); 
    }

    //Inset Product Cart
    public function insertCart(Request $request)
    {
        $id = $request->product_id;
        $product    = Product::where('id', $id)->where('status', 1)->first();
        // Card Add
        if ($product->discount_price == null) {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);
            // json
            // return response()->json($data);
            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);

        } else {
            $data                      = array();
            $data['id']                = $product->id;
            $data['name']              = $product->product_name;
            $data['qty']               = $request->qty;
            $data['price']             = $product->discount_price;
            $data['weight']            = 1;
            $data['options']['image']  = $product->image_one;
            $data['options']['size']   = $request->color;
            $data['options']['colour'] = $request->size;
            Cart::add($data);
            // json
            $notification=array(
                'messege'=>'Add To Cart Successfully.!',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification); 
        }
    }

    //CheckOut
    public function checkOut()
    {
        if (Auth::check()) {
            $cart = Cart::content();
            return view('frontend.pages.checkout', compact('cart'));
        }else{
            $notification=array(
                'messege'=>'At First Login Your Account',
                'alert-type'=>'errror'
            );
            return redirect()->to('login')->with($notification);
        }
    }

    //Coupon
    public function coupon(Request $request)
    {
        $coupon = $request->coupon;
        $couponCheck = Cupon::where('coupon', $coupon)->first();
        $str = Cart::Subtotal();
        $cartTotal = str_replace(',', '', $str);

        if ($couponCheck) {
            session::put('coupon', [
                'name'     => $couponCheck->coupon,
                'discount' => $couponCheck->discount,
                'amount'   => $cartTotal - $couponCheck->discount,
            ]);
            $notification=array(
                'messege'=>'Coupon Applied Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            // Notification...
            $notification = array(
                'messege'    => 'Sorry! The Coupon Code is already expired',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    //Remove Coupon
    public function couponRemove(Request $request)
    {
        session::forget('coupon');
        return redirect()->back();
    }

}


