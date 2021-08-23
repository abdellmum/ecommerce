<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\model\admin\PostCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $postCategory = PostCategory::latest()->get();
        return view('admin.postCategory.postCategory_index',compact('postCategory'));
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
            'category_name_en' => 'required|unique:post_categories|max:155',
            'category_name_bn' => 'required|unique:post_categories|max:155',
        ]);
        
        $postCategory = new PostCategory();
        $postCategory->category_name_en = $request->category_name_en;
        $postCategory->category_name_bn = $request->category_name_bn;
        $postCategory->save();
        $notification=array(
            'messege'=>'Post Category Add Successfully.',
            'alert-type'=>'success'
        );
        //Redirect.
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
        $editPost = PostCategory::find($id);
        return view('admin.postCategory.postCategory_edit',compact('editPost'));
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
            'category_name_en' => 'required|max:155',
            'category_name_bn' => 'required|max:155',
        ]);
        
        $postCategory = PostCategory::find($id);
        $postCategory->category_name_en = $request->category_name_en;
        $postCategory->category_name_bn = $request->category_name_bn;
        $postCategory->save();
        $notification=array(
            'messege'=>'Post Category Update Successfully.',
            'alert-type'=>'success'
        );
        //Redirect.
        return Redirect()->route('admin.postCategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PostCategory = PostCategory::find($id);
        $PostCategory->delete();
        $notification=array(
            'messege'=>'Post Category Deleted Successfully.',
            'alert-type'=>'success'
        );
        //Redirect.
        return Redirect()->back()->with($notification);
    }
}
