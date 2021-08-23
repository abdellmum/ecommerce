<?php

namespace App\Http\Controllers\admin\Report;

use App\Http\Controllers\Controller;
use App\model\Frontend\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //Today Order
    public function todayOrder()
    {
        $today = date('d-m-Y');
        $order_sale = Order::where('status', 0)->where('date', $today)->sum('total');
        $orders = Order::where('status', 0)->where('date', $today)->get();
        return view('admin.report.today_order_report', compact('order_sale','orders'));
    }

    //Today Delivery
    public function todayDelivery()
    {
        $today = date('d-m-Y');
        $order_sale = Order::where('status', 3)->where('date', $today)->sum('total');
        $orders = Order::where('status', 3)->where('date', $today)->get();
        return view('admin.report.today_delivery_report', compact('order_sale','orders'));
    }

    //This Month Order
    public function reportMonth()
    {
        $month = date('m');
        $order_sale = Order::where('status', 3)->where('month', $month)->sum('total');
        $orders = Order::where('status', 3)->where('month', $month)->get();
        return view('admin.report.month_order_report', compact('order_sale','orders'));
    }

    //This year Order
    public function reportYear()
    {
        $year = date('Y');
        $order_sale = Order::where('status', 3)->where('year', $year)->sum('total');
        $orders = Order::where('year', $year)->where('status', 3)->get();
        return view('admin.report.year_order_report', compact('order_sale','orders'));
    }

    //Search Report
    public function searchIndex()
    {
        return view('admin.report.search_report');
    }

    //Date Wise Search
    public function dateSeach(Request $request)
    {
        $date = date('d-m-Y', strtotime($request->date));
        $order_sale = Order::where('status', 3)->where('date', $date)->sum('total');
        $orders     = Order::where('status', 3)->where('date', $date)->get();
        return view('admin.report.date_wise_search', compact('order_sale','orders'));
    }

    //Month Wise Search
    public function monthSearch(Request $request)
    {
        $month = $request->month;
        $order_sale = Order::where('status', 3)->where('month', $month)->sum('month');
        $orders  = Order::where('status', 3)->where('month', $month)->get();
        return view('admin.report.month_wise_search', compact('order_sale','orders'));
    }

    //Year Wise Search
    public function yearSearch(Request $request)
    {
        $year = $request->year;
        $order_sale = Order::where('status', 3)->where('year', $year)->sum('total');
        $orders   = Order::where('status', 3)->where('year', $year)->get();
        return view('admin.report.year_wise_search', compact('order_sale','orders'));
    }

    // Search Report Between
    public function betweenSearch(Request $request)
    {
        $start_date = date('d-m-Y', strtotime($request->start_date));
        $end_date = date('d-m-Y', strtotime($request->end_date));
        $order_sale = Order::whereBetween('date', [$start_date, $end_date])->where('status', 3)->sum('total');
        $orders = Order::whereBetween('date', [$start_date, $end_date])->where('status', 3)->get();
        return view('admin.report.between_wise_search', compact('order_sale', 'orders','start_date', 'end_date'));
    }

}
