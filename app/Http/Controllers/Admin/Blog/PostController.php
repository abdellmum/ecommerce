<?php

namespace App\Http\Controllers\Admin\Blog;

use Image;
use Illuminate\Http\Request;
use App\model\admin\BlogPost;
use App\model\admin\PostCategory;
use App\Http\Controllers\Controller;

class PostController extends Controller
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
        $posts = BlogPost::latest()->get();
        return view('admin.blogPost.post_index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategory = PostCategory::all();
        return view('admin.blogPost.post_create',compact('postCategory'));
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
            'post_category_id' => 'required',
            'post_title_en' => 'required|max:155',
            'post_title_bn' => 'required|max:155',
            'image'         => 'image|mimes:jpg,png,jpeg,gif|required',
            'post_description_en' => 'required|min:25',
            'post_description_bn' => 'required|min:25',
        ]);

        $posts = new BlogPost();
        $posts->post_category_id = $request->post_category_id;
        $posts->post_title_en = $request->post_title_en;
        $posts->post_title_bn = $request->post_title_bn;
        $posts->image = $request->image;
        $posts->post_description_en = $request->post_description_en;
        $posts->post_description_bn = $request->post_description_bn;
        $posts->status = 1;
        
        // Image One Upload
        $image   = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(230, 300)->save('backend/media/post/' . $image_name);
            $posts->image = $image_name;
        // Save Product Data...
        $posts->save();
        // Notification...
        $notification=array(
            'messege'=>'Post Add Successfully.',
            'alert-type'=>'success'
        );
        //Redirect.
        return Redirect()->back()->with($notification);
        }else {
        // Notification...
        $notification=array(
            'messege'=>'Post Not Added.',
            'alert-type'=>'warning'
        );
        //Redirect.
        return Redirect()->back()->with($notification);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postShow = BlogPost::find($id);
        return view('admin.blogPost.post_show',compact('postShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postCategory = PostCategory::all();
        $editPost = BlogPost::find($id);
        return view('admin.blogPost.post_edit',compact('editPost','postCategory'));
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
            'post_category_id' => 'required',
            'post_title_en' => 'required|max:155',
            'post_title_bn' => 'required|max:155',
            'image'         => 'image|mimes:jpg,png,jpeg,gif',
            'post_description_en' => 'required|min:25',
            'post_description_bn' => 'required|min:25',
        ]);

        $postupdate = BlogPost::find($id);
        $postupdate->post_category_id = $request->post_category_id;
        $postupdate->post_title_en = $request->post_title_en;
        $postupdate->post_title_bn = $request->post_title_bn;
        $postupdate->post_description_en = $request->post_description_en;
        $postupdate->post_description_bn = $request->post_description_bn;       
        // Image One Upload
        $image   = $request->file('image');
        if ($image) {
            @unlink(public_path('backend/media/post/' . $postupdate->image ));
            //Image Update..
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(230, 300)->save('backend/media/post/' . $image_name);
            $postupdate->image = $image_name;
            $postupdate->save();
            $notification=array(
                'messege'=>'Image Update successfuly.',
                'alert-type'=>'success'
            );
            //Redirect.
            return Redirect()->route('admin.blogPost.index')->with($notification);
        }
        // Save Product Data...
        $postupdate->save();
        // Notification...
        $notification=array(
            'messege'=>'Post Update Successfully.',
            'alert-type'=>'success'
        );
        //Redirect.
        return Redirect()->route('admin.blogPost.index')->with($notification);   
    }

    public function active($id)
    {
        $BlogPost = BlogPost::findorfail($id);
        $BlogPost->status = 1;
        $BlogPost->save();
        // Notification...
        $notification=array(
            'messege'=>'Post Active successfuly.',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }

    public function inctive($id)
    {
        $BlogPost = BlogPost::findorfail($id);
        $BlogPost->status = 0;
        $BlogPost->save();
        // Notification...
        $notification=array(
            'messege'=>'This Post Inctive.',
            'alert-type'=>'warning'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postDelete = BlogPost::find($id);
        $image          = $postDelete->image;
        if ($image) {
            @unlink(public_path('/backend/media/post/') . $postDelete->image);
            $postDelete->delete();
        }
        // Notification...
        $notification=array(
            'messege'=>'Post Delete successfuly.',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }
}
