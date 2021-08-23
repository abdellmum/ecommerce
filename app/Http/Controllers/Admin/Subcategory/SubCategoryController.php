<?php

namespace App\Http\Controllers\Admin\Subcategory;

use Illuminate\Http\Request;
use App\model\admin\Category;
use App\model\admin\Sub_Category;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
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
        $category = Category::all();
        $sub_category = Sub_Category::orderBy('id', 'desc')->get();
        return view('admin.subcategory.subcategory_index',compact('category','sub_category'));
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
        'category_id' => 'required',
        'subcategory_name' => 'required|max:150',
        ]);
        
        $subcategory = new Sub_Category();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = $request->subcategory_name;
        $subcategory->save();
        $notification=array(
                'messege'=>'Sub Category Add Successfully.!',
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
        $subcategory = Sub_Category::find($id);
        $category = Category::all();
        return view('admin.subcategory.subcategory_edit',compact('subcategory','category'));
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
            'category_id' => 'required',
            'subcategory_name' => 'max:150',
        ]);
        
        $subcategory = Sub_Category::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = $request->subcategory_name;
        $update = $subcategory->save();
        if ($update) {
            $notification=array(
                    'messege'=>'Sub Category Update Successfully.!',
                    'alert-type'=>'success'
                );
            return Redirect()->route('admin.subcategory.index')->with($notification);
        }else {
            $notification=array(
                    'messege'=>'Category Not Updated',
                    'alert-type'=>'error'
                );
            return Redirect()->route('admin.subcategory.index')->with($notification);
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
        $subcategory = Sub_Category::find($id);
        $subcategory->delete();
        $notification=array(
                'messege'=>'Sub Category Deleted Successfully.!',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
