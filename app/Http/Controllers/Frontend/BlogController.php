<?php

namespace App\Http\Controllers\Frontend;

use Session;
use Illuminate\Http\Request;
use App\model\admin\BlogPost;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    // All Blog post... 
    public function Blog(){
        $Blog = BlogPost::latest()->get();
        return view('frontend.pages.blog.all_blog', compact('Blog'));
    }

    //Language English
    public function BlogEng()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language','english');
        // redirect
        return redirect()->back();
    }
    //Language English
    public function BlogBan()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language','bangla');
        // redirect
        return redirect()->back();
    }
}
