<?php

namespace App\Http\Controllers\Admin\OrderReturn;

use Illuminate\Http\Request;
use App\model\Frontend\Order;
use App\model\Frontend\Shipping;
use App\Http\Controllers\Controller;
use App\model\Frontend\Order_Details;

class ReturnController extends Controller
{
        // Return Order
        public function orderReturn()
        {
            $orders = Order::where('return_order', 1)->orderBy('id','ASC')->get();
            return view('admin.return_orders.return_order', compact('orders'));
        }
    
        // Return Order view
        public function returnShow($id)
        {
            $order = order::where('id', $id)->first();
            $shipping = Shipping::where('order_id', $id)->first();
            $order_details = Order_Details::where('order_id', $id)->get();
            return view('admin.return_orders.return_order_view', compact('order', 'shipping', 'order_details'));
        }
    
        // Return Order Approve
        public function returnApprove($id)
        {
            $approve = Order::find($id);
            $approve->return_order = 2;
            $approve->save();
            // Notification...
            $notification=array(
                'messege'=>'Return Successfully done !',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.orders.return.index')->with($notification);
        }
    
        // All Return Order
        public function allReturn()
        {
            $orders = Order::where('return_order', 2)->orderBy('id','ASC')->get();
            return view('admin.return_orders.all_return_orders', compact('orders'));
        }
}
