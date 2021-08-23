<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\model\admin\Category;
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
        $category = Category::orderBy('id', 'desc')->get();;
        return view('admin.category.category_index',compact('category'));
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
            'category_name' => 'required|unique:categories|max:64|min:4',
        ]);
        
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_name;
        $category->save();
        $notification=array(
                'messege'=>'Category Add Successfully.!',
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
        $category = Category::findorfail($id);
        return view('admin.category.category_edit',compact('category'));
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
            'category_name' => 'required|unique:categories|max:64|min:4|string',
        ]);
        
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_name;
        $update = $category->save();
        if ($update) {
            $notification=array(
                    'messege'=>'Category Update Successfully.!',
                    'alert-type'=>'success'
                );
               return Redirect()->route('admin.category.index')->with($notification);
        }else {
            $notification=array(
                    'messege'=>'Category Not Updated',
                    'alert-type'=>'error'
                );
               return Redirect()->route('admin.category.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        $notification=array(
                'messege'=>'Category Deleted Successfully.!',
                'alert-type'=>'warning'
            );
        return Redirect()->back()->with($notification);
    }
}
