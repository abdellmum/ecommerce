<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\model\admin\Cupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = Cupon::all();
        return view('admin.coupon.coupon_index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'coupon' => 'required|unique:cupons|max:55',
            'discount' => 'required|max:2',
        ]);
        
        $coupon = new Cupon();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        $notification=array(
                'messege'=>'Coupon Add Successfully.!',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Cupon::find($id);
        return view('admin.coupon.coupon_edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'coupon' => 'required|max:55',
            'discount' => 'required|max:2',
        ]);
        
        $coupon = Cupon::find($id);
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        $notification=array(
            'messege'=>'Coupon Update Successfully.!',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.coupon.index')->with($notification); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Cupon::find($id);
        $coupon->delete();
        $notification=array(
                'messege'=>'Coupon Deleted Successfully.!',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
