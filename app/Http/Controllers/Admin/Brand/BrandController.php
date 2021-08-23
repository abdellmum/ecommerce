<?php

namespace App\Http\Controllers\Admin\Brand;

use App\model\admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
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
        $brands = Brand::orderBy('id', 'desc')->get();;
        return view('admin.brand.brand_index',compact('brands'));
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
            'brand_name' => 'required|unique:brands|max:80',
            'brand_logo' => 'mimes:jpeg,bmp,png',
        ]);
        
        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_slug = $request->brand_name;
        if ($request->file('brand_logo')) {
            $file = $request->file('brand_logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/media/brands'), $filename);
            $brands['brand_logo'] = $filename;
            $brands->save();
            $notification=array(
                'messege'=>'Category Add Successfully.!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $brands->save();
            $notification=array(
                'messege'=>'Brands Logo Not Found!',
                'alert-type'=>'error'
                 );
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
        $brands = Brand::find($id);
        return view('admin.brand.brand_edit',compact('brands'));
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
            'brand_name' => 'required|max:60|unique:brands|string',
            'brand_logo' => 'mimes:jpeg,bmp,png',
        ]);
        
        $brands = Brand::findorfail($id);
        $brands->brand_name = $request->brand_name;
        $brands->brand_slug = $request->brand_name;
        if ($request->file('brand_logo')) {
            $file = $request->file('brand_logo');
            @unlink(public_path('backend/media/brands/'.$brands->brand_logo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/media/brands'), $filename);
            $brands['brand_logo'] = $filename;
            $brands->save();
            $notification=array(
                'messege'=>'Brand Update Successfully.!',
                'alert-type'=>'success'
            );
        }else {
            $brands->save();
            $notification=array(
                'messege'=>'Update Without Image Successfully.!',
                'alert-type'=>'success'
            );
        }
        return Redirect()->route('admin.brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands = Brand::findorfail($id);
        if (file_exists('backend/media/brands/' .$brands->brand_logo) AND ! empty($brands->brand_logo)) {
           unlink('backend/media/brands/' .$brands->brand_logo);
        }
        $brands->delete();
        $notification=array(
                'messege'=>'Brand Deleted Successfully.!',
                'alert-type'=>'warning'
            );
        return Redirect()->back()->with($notification);
    }
}
