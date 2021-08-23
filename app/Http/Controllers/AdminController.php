<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use Carbon\Carbon;
use App\model\admin\Brand;
use App\model\admin\Product;
use Illuminate\Http\Request;
use App\model\admin\BlogPost;
use App\model\Frontend\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Total sale 
        $today = date('d-m-Y');
        $data['today_sale'] = Order::where('date', $today)->whereNotIn('status', [4])->sum('subtotal');
        $data['today_sale_gross'] = Order::where('date', $today)->whereNotIn('status', [4])->sum('payment_amount');
        $data['today_tex'] = Order::where('date', $today)->whereNotIn('status', [4])->sum('vat');
        $data['today_delievered'] = Order::where('date', $today)->where('status', 3)->where('return_order', 0)->sum('subtotal');
        $data['today_delievered_gross'] = Order::where('date', $today)->where('status', 3)->where('return_order', 0)->sum('payment_amount');
        $data['today_delievered_tex'] = Order::where('date', $today)->where('status', 3)->where('return_order', 0)->sum('vat');
        // Weekly Sale
        $mygetdate = Carbon::today()->subDays(7);
        $data['weekly_sale'] = Order::where('created_at', '>=', $mygetdate)->whereNotIn('status', [4])->sum('subtotal');
        $data['weekly_sale_gross'] = Order::where('created_at', '>=', $mygetdate)->whereNotIn('status', [4])->sum('payment_amount');
        $data['weekly_tex'] = Order::where('created_at', '>=', $mygetdate)->whereNotIn('status', [4])->sum('vat');
        $data['weekly_delievered'] = Order::where('created_at', '>=', $mygetdate)->where('status', 3)->where('return_order', 0)->sum('subtotal');
        $data['weekly_delievered_gross'] = Order::where('created_at', '>=', $mygetdate)->where('status', 3)->where('return_order', 0)->sum('payment_amount');
        $data['weekly_delievered_tex'] = Order::where('created_at', '>=', $mygetdate)->where('status', 3)->where('return_order', 0)->sum('vat');
        // This Month
        $month = date('m');
        $data['this_month'] = Order::where('month', $month)->where('status', 3)->where('return_order', 0)->sum('subtotal');
        $data['this_month_gross'] = Order::where('month', $month)->where('status', 3)->where('return_order', 0)->sum('payment_amount');
        $data['this_month_tex'] = Order::where('month', $month)->where('status', 3)->where('return_order', 0)->sum('vat');
        $data['this_month_return'] = Order::where('month', $month)->where('status', 3)->whereNotIn('return_order', [0])->get();
        $data['this_month_return_gross'] = Order::where('month', $month)->where('status', 3)->whereNotIn('return_order', [0])->sum('payment_amount');
        $data['this_month_return_vat'] = Order::where('month', $month)->where('status', 3)->whereNotIn('return_order', [0])->sum('vat');
        // This Year
        $year = date('Y');
        $data['this_year'] = Order::where('year', $year)->where('status', 3)->where('return_order', 0)->sum('subtotal');
        $data['this_year_gross'] = Order::where('year', $year)->where('status', 3)->where('return_order', 0)->sum('payment_amount');
        $data['this_year_tex'] = Order::where('year', $year)->where('status', 3)->where('return_order', 0)->sum('vat');
        $data['this_year_return'] = Order::where('year', $year)->where('status', 3)->whereNotIn('return_order', [0])->get();
        $data['this_year_return_gross'] = Order::where('year', $year)->where('status', 3)->whereNotIn('return_order', [0])->sum('payment_amount');
        $data['this_year_return_vat'] = Order::where('year', $year)->where('status', 3)->whereNotIn('return_order', [0])->sum('vat');
        // Brand
        $data['brands'] = Brand::all();
        // Blog
        $data['blogs'] = BlogPost::all();
        // Product
        $data['products'] = Product::where('status', 1)->get();
        // User
        $data['users'] = User::all();
        return view('admin.home', $data);
    }

    public function ChangePassword()
    {
        return view('admin.auth.passwordchange');
    }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                $user=Admin::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                Auth::logout();  
                $notification=array(
                  'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                  'alert-type'=>'success'
                    );
                  return Redirect()->route('admin.login')->with($notification); 
              }else{
                  $notification=array(
                    'messege'=>'New password and Confirm Password not matched!',
                    'alert-type'=>'error'
                  );
                    return Redirect()->back()->with($notification);
                }     
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }
    }

    public function logout()
    {
        Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
            );
        return Redirect()->route('admin.login')->with($notification);
    }

}
