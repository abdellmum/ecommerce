<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\model\admin\Setting;
use App\model\frontend\Contact_Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     // Contact Page
     public function contact()
     {
         $setting = Setting::first();
         return view('frontend.pages.contact_page', compact('setting'));
     }
 
     // message stooree
     public function contactStore(Request $request)
      {
         $request->validate([
             'name' => 'required',
             'email' => 'required',
             'phone' => 'required',
             'message' => 'required'
         ]);
         // store
         $contactMessage = new Contact_Message();
         $contactMessage->name = $request->name;
         $contactMessage->email = $request->email;
         $contactMessage->phone = $request->phone;
         $contactMessage->message = $request->message;
         $contactMessage->save();
        // Notification
        $notification=array(
             'messege' => 'Message Send Successfully',
             'alert-type' => 'success',
         );
         // Redirect
         return redirect()->back()->with($notification);
         
      }
}
