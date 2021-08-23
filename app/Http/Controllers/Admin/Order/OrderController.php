<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\model\Frontend\Order;
use App\Http\Controllers\Controller;
use App\model\admin\Product;
use App\model\Frontend\Order_Details;
use App\model\Frontend\Shipping;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Pending Order view.. 
    public function index()
    {
        $orders = Order::where('status', 0)->orderBy('id','ASC')->get();
        return view('admin.orders.order_index', compact('orders'));
    }

    // Confirm Order view
    public function confirmIndex()
    {
        $orders = Order::where('status', 1)->orderBy('id','ASC')->get();
        return view('admin.orders.order_confirmOrder', compact('orders'));
    }

    //Progress view
    public function progressIndex()
    {
        $progressOrder = Order::where('status', 2)->orderBy('id','ASC')->get();
        return view('admin.orders.order_progress', compact('progressOrder'));
    }

    //Delivery view

    public function deliveryIndex()
    {
        $delivery = Order::where('status', 3)->orderBy('id','ASC')->get();
        return view('admin.orders.order_delivered', compact('delivery'));
    }

    // Cancle View
    public function cancleIndex()
    {
        $orders = Order::where('status', 4)->orderBy('id','ASC')->get();
        return view('admin.orders.order_cancle', compact('orders'));
    }


    // Order Show
    public function show($id)
    {
        $order = order::where('id', $id)->first();
        $shipping = Shipping::where('order_id', $id)->first();
        $order_details = Order_Details::where('order_id', $id)->get();
        return view('admin.orders.order_view', compact('order', 'shipping', 'order_details'));
    }

    // Order-Accept and Order-Manage
    public function orderAccept($id)
    {
        //Stock Manage
        $orders = Order_Details::where('order_id', $id)->get();
        foreach ($orders as $row) {
            $product = Product::where('id', $row->product_id)->first();
            $product->product_quantity = $product->product_quantity - $row->qty;
            $product->save();
        }
        // Status Change
        $orderAccept = Order::find($id);
        $orderAccept->status = 1;
        $orderAccept->save();
        // Notification...
        $notification=array(
            'messege'=>'Order Comfirm Successfully !',
            'alert-type'=>'success'
        );
        // Redirect
        return redirect()->route('admin.orders.index')->with($notification);
    }

    // Cancle Order
    public function orderCancle($id)
    {
        $cancle = Order::find($id);
        $cancle->status = 4;
        $cancle->save();
        // Notification...
        $notification=array(
            'messege'=>'Order Comfirm Successfully !',
            'alert-type'=>'success'
        );
        // Redirect
        return redirect()->route('admin.orders.index')->with($notification);
    }

    // Order Prograss.. 
    public function orderProgress($id)
    {
        $orderPrograss = Order::find($id);
        $orderPrograss->status = 2;
        $orderPrograss->save();
        $notification=array(
            'messege'=>'Order Comfirm Successfully !',
            'alert-type'=>'success'
        );
        // Redirect
        return redirect()->route('admin.orders.confirm.index')->with($notification);
    }

    // Order Delievered.. 
    public function orderDelivered($id)
    {
        $orderDelivery = Order::find($id);
        $orderDelivery->status = 3;
        $orderDelivery->save();
        $notification = array(
            'message'    => 'Order Delievered Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.orders.progress.index')->with($notification);
    }


}

