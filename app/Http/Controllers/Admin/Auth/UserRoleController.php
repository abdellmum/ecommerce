<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // User list
    public function index()
    {
        $subAdmins = Admin::where('user_type', 2)->get();
        return view('admin.userRole.user_list', compact('subAdmins'));
    }

    // User Add
    public function Create()
    {
        return view('admin.userRole.user_add');
    }

    // User Store
    public function Store(Request $request)
    {
        //Validation
        $validation = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:admins',
            'phone'         => 'required',
            'password'      => 'required|min:5',
            // 'admin_profile' => 'mimes:jpeg,bmp,png',
        ]);

        //User Store
        $userStore = new Admin();
        $userStore->name = $request->name;
        $userStore->email = $request->email;
        $userStore->phone = $request->phone;
        $userStore->password = Hash::make($request->password);
        $userStore->category = $request->category;
        $userStore->coupon = $request->coupon;
        $userStore->product = $request->product;
        $userStore->blog = $request->blog;
        $userStore->order = $request->order;
        $userStore->report = $request->report;
        $userStore->user_role = $request->user_role;
        $userStore->return_order = $request->return_order;
        $userStore->contact_message = $request->contact_message;
        $userStore->product_comment	 = $request->product_comment	;
        $userStore->product_stock = $request->product_stock;
        $userStore->setting = $request->setting;
        $userStore->other = $request->other;
        $userStore->user_type = 2;
        // Save Product Data...
        $userStore->save();
        // Notification...
        $notification=array(
            'messege'=>'Add New Sub-Admin Successfully !',
            'alert-type'=>'success'
        );
        //Redirect.
        return Redirect()->back()->with($notification);
    }

    // User Edit
    public function userEdit($id)
    {
        $subAdmins = Admin::where('id', $id)->where('user_type', 2)->first();
        return view('admin.userRole.user_edit', compact('subAdmins'));
    }

    // User Update
    public function userUpdate(Request $request, $id)
    {
        //Validation
        $validation = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
        ]);

        $userUpdate = Admin::find($id);
        $userUpdate->name = $request->name;
        $userUpdate->email = $request->email;
        $userUpdate->phone = $request->phone;
        $userUpdate->category = $request->category;
        $userUpdate->coupon = $request->coupon;
        $userUpdate->product = $request->product;
        $userUpdate->blog = $request->blog;
        $userUpdate->order = $request->order;
        $userUpdate->report = $request->report;
        $userUpdate->user_role = $request->user_role;
        $userUpdate->return_order = $request->return_order;
        $userUpdate->contact_message = $request->contact_message;
        $userUpdate->product_comment	 = $request->product_comment	;
        $userUpdate->product_stock = $request->product_stock;
        $userUpdate->setting = $request->setting;
        $userUpdate->other = $request->other;
        // Save Product Data...
        $userUpdate->save();
        // Notification...
        $notification=array(
            'messege'=>'User Role Update Successfully !',
            'alert-type'=>'success'
        );
        //Redirect.
        return Redirect()->route('admin.user.all.list')->with($notification);
    }

    // User Delete
    public function userDestroy($id)
    {
        $userDelete = Admin::find($id);
        $userDelete->delete();
        // Notification...
        $notification=array(
            'messege'=>'Sub-Admin Delete Successfully !',
            'alert-type'=>'success'
        );
        //Redirect.
        return Redirect()->back()->with($notification);
    }

}
