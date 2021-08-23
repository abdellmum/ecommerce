<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\model\admin\Newslatter;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:newslatters|max:255',
        ]);

        $newslatter = new Newslatter();
        $newslatter->email = $request->email;
        $newslatter->save();
        $notification=array(
                'messege'=>'Subscribing Successfully.!',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification); 
    }
}
