<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\model\admin\Brand;
use App\model\admin\Product;
use Illuminate\Http\Request;
use App\model\admin\Category;
use App\model\admin\Sub_Category;
use Image;

class ProductController extends Controller
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
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.product.product_index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('Admin.product.product_create',Compact('category','brand'));
    }

    // Subcategory get by ajax

    public function subCategoryGet(Request $request)
    {
        $category_id = $request->category_id;
        $subCategory = Sub_Category::where('category_id', $category_id)->get();
        return response()->json($subCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation...
        $validation = $request->validate([
            'product_name'         => 'required',
            'product_code'         => 'required|unique:products',
            'product_quantity'     => 'required',
            'category_id'          => 'required',
            'subcategory_id'       => 'required',
            'brand_id'             => 'required',
            'selling_price'        => 'required',
            'product_details'      => 'required|min:15',
            'image_one'            => 'image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|required',
            'image_two'            => 'image|mimes:jpg,png,jpeg,gif,webp',
            'image_three'          => 'image|mimes:jpg,png,jpeg,gif,webp',
        ]);

        // Product Store...
        $product = new Product();
        $product->category_id               = $request->category_id;
        $product->subcategory_id            = $request->subcategory_id;
        $product->brand_id                  = $request->brand_id;
        $product->product_name              = $request->product_name;
        $product->slug                      = $request->product_name;
        $product->product_code              = $request->product_code;
        $product->product_quantity          = $request->product_quantity;
        $product->product_details           = $request->product_details;
        $product->product_colour            = $request->product_colour;
        $product->product_size              = $request->product_size;
        $product->selling_price             = $request->selling_price;
        $product->video_link                = $request->video_link;
        $product->main_slider               = $request->main_slider;
        $product->hot_deal                  = $request->hot_deal;
        $product->best_rated                = $request->best_rated;
        $product->mid_slider                = $request->mid_slider;
        $product->hot_new                   = $request->hot_new;
        $product->trend                     = $request->trend;
        $product->bye_one_get_one           = $request->bye_one_get_one;
        $product->status                    = 1;

        // Image One Upload
        $image_one   = $request->file('image_one');
        $image_two   = $request->file('image_two');
        $image_three = $request->file('image_three');

        // Image One & Two & Three
        if ($image_one && $image_two && $image_three) {
            // Image One Upload...
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('backend/media/product/' . $image_one_name);
            $product->image_one = $image_one_name;
            // Image Two Upload...
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('backend/media/product/' . $image_two_name);
            $product->image_two = $image_two_name;
            // Image One Upload...
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('backend/media/product/' . $image_three_name);
            $product->image_three = $image_three_name;
            $product->save();
        }
        // Image One & Two
        if ($image_one && $image_two) {
            // Image One Upload...
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('backend/media/product/' . $image_one_name);
            $product->image_one = $image_one_name;
            // Image Two Upload...
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('backend/media/product/' . $image_two_name);
            $product->image_two = $image_two_name;
            $product->save();
        }
        // Image One & Three
        if ($image_one && $image_three) {
            // Image One Upload...
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('backend/media/product/' . $image_one_name);
            $product->image_one = $image_one_name;
            // Image One Upload...
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('backend/media/product/' . $image_three_name);
            $product->image_three = $image_three_name;
            $product->save();
        }
        // image One
        if (isset($image_one)) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('backend/media/product/' . $image_one_name);
            $product->image_one = $image_one_name;
            $product->save();
        }
        // Save Product Data...
        $product->save();
        // Notification...
        $notification=array(
            'messege'=>'Product added successfuly.',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        // Notification...
        $notification=array(
            'messege'=>'Product Active successfuly.',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        // Notification...
        $notification=array(
            'messege'=>'Inactive this Product .',
            'alert-type'=>'warning'
        );
        // Redirect.
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
        $productShow = Product::find($id);
        return view('admin.product.product_show',compact('productShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Sub_Category::all();
        $category = Category::all();
        $brand = Brand::all();
        $productShow = Product::find($id);
        return view('admin.product.product_edit',compact('subcategory','category','brand','productShow'));
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
        // validation...
        $validation = $request->validate([
            'product_name'       => 'required',
            'product_code'       => 'required',
            'product_quantity'   => 'required',
            'category_id'        => 'required',
            'brand_id'             => 'required',
            'selling_price'      => 'required',
            'product_details'    => 'required|min:15',
            'image_one'          => 'image|mimes:jpg,png,jpeg,gif',
            'image_two'          => 'image|mimes:jpg,png,jpeg,gif',
            'image_three'        => 'image|mimes:jpg,png,jpeg,gif',
        ]);

        // Product Update...
        $productUpdate = Product::findorfail($id);
        $productUpdate->category_id                 = $request->category_id;
        $productUpdate->subcategory_id              = $request->subcategory_id;
        $productUpdate->brand_id                    = $request->brand_id;
        $productUpdate->product_name                = $request->product_name;
        $productUpdate->product_code                = $request->product_code;
        $productUpdate->product_quantity            = $request->product_quantity;
        $productUpdate->product_details             = $request->product_details;
        $productUpdate->product_colour              = $request->product_colour;
        $productUpdate->product_size                = $request->product_size;
        $productUpdate->selling_price               = $request->selling_price;
        $productUpdate->discount_price              = $request->discount_price;
        $productUpdate->video_link                  = $request->video_link;
        $productUpdate->main_slider                 = $request->main_slider;
        $productUpdate->hot_deal                    = $request->hot_deal;
        $productUpdate->best_rated                  = $request->best_rated;
        $productUpdate->mid_slider                  = $request->mid_slider;
        $productUpdate->hot_new                     = $request->hot_new;
        $productUpdate->trend                       = $request->trend;
        $productUpdate->bye_one_get_one             = $request->bye_one_get_one;

        // Image One Update
        $image_one   = $request->file('image_one');
        $image_two   = $request->file('image_two');
        $image_three = $request->file('image_three');

        // Image One And Two Update
        if ($image_one && $image_two) {
            @unlink(public_path('backend/media/product/' . $productUpdate->image_one ));
            @unlink(public_path('backend/media/product/' . $productUpdate->image_two ));
            //Update image Image...
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('backend/media/product/' . $image_one_name);
            $productUpdate->image_one = $image_one_name;
            // Update image Two..
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('backend/media/product/' . $image_two_name);
            $productUpdate->image_two = $image_two_name;
            // Save Product Update Data...
            $productUpdate->save();
            // Notification...
            $notification=array(
                'messege'=>'Image One and Two Update successfuly.',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
        }
        // Image Two And Three Update
        if ($image_two && $image_three) {
            @unlink(public_path('backend/media/product/' . $productUpdate->image_two ));
            @unlink(public_path('backend/media/product/' . $productUpdate->image_three ));
            // Update image Two..
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('backend/media/product/' . $image_two_name);
            $productUpdate->image_two = $image_two_name;
            //Update image Image...
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('backend/media/product/' . $image_three_name);
            $productUpdate->image_three = $image_three_name;
            // Save Product Update Data...
            $productUpdate->save();
            // Notification...
            $notification=array(
                'messege'=>'Image One and Two Update successfuly.',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
        }
        // Image One And Three Update
        if ($image_one && $image_three) {
            @unlink(public_path('backend/media/product/' . $productUpdate->image_one ));
            @unlink(public_path('backend/media/product/' . $productUpdate->image_three ));
            //Update image Image...
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('backend/media/product/' . $image_one_name);
            $productUpdate->image_one = $image_one_name;
            // Update image Two..
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('backend/media/product/' . $image_three_name);
            $productUpdate->image_three = $image_three_name;
            // Save Product Update Data...
            $productUpdate->save();
            // Notification...
            $notification=array(
                'messege'=>'Image One and Three Update successfuly.',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
        }
        // One image update
        if (isset($image_one)) {
            @unlink(public_path('backend/media/product/' . $productUpdate->image_one));
            // Update image One..
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('backend/media/product/' . $image_one_name);
            $productUpdate->image_one = $image_one_name;
            // Save Product Update Data...
            $productUpdate->save();
            // Notification...
            $notification=array(
                'messege'=>'Image One Update successfuly.',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
        }
        // Two image update
        if (isset($image_two)) {
            @unlink(public_path('backend/media/product/' . $productUpdate->image_two));
            // Update image Two..
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('backend/media/product/' . $image_two_name);
            $productUpdate->image_two = $image_two_name;
            // Save Product Update Data...
            $productUpdate->save();
            // Notification...
            $notification=array(
                'messege'=>'Image Two Update successfuly.',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
        }
        // Three image update
        if (isset($image_three)) {
            @unlink(public_path('backend/media/product/' . $productUpdate->image_three));
            // Update image Three..
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('backend/media/product/' . $image_three_name);
            $productUpdate->image_three = $image_three_name;
            // Save Product Update Data...
            $productUpdate->save();
            // Notification...
            $notification=array(
                'messege'=>'Image Three Update successfuly.',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
        }
        // Save Product Update Data...
        if ($productUpdate) {
            $productUpdate->save();
            // Notification...
            $notification=array(
                'messege'=>'Product Update successfuly.',
                'alert-type'=>'success'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
        }else{
            // Notification...
            $notification=array(
                'messege'=>'Product Not Update.',
                'alert-type'=>'warning'
            );
            // Redirect.
            return Redirect()->route('admin.product.index')->with($notification);
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
        $productDelete = Product::find($id);
        $img1          = $productDelete->image_one;
        $img2          = $productDelete->image_two;
        $img3          = $productDelete->image_three;
        // Image Delete...
        if ($img1 && $img2 && $img3) {
            @unlink(public_path('/backend/media/product/') . $img1);
            @unlink(public_path('/backend/media/product/') . $img2);
            @unlink(public_path('/backend/media/product/') . $img3);
            $productDelete->delete();
        }
        // Notification...
        $notification=array(
            'messege'=>'Product Delete successfuly.',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }

    public function stockProduct()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('Admin.stock.product_stock', compact('products'));
    }
}
