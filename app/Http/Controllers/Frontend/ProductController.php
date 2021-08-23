<?php

namespace App\Http\Controllers\Frontend;

use App\model\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\model\admin\Brand;
use App\model\admin\Category;
use App\model\admin\Sub_Category;
// use Cart;
use Response;

class ProductController extends Controller
{
    public function productDetails($product_code,$product_name)
    {
        $product = Product::Where('status', 1)->where('product_code', $product_code)->first();
       
        $color=$product->product_colour;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',' , $size);
        
       return view('frontend.pages.product_details', compact('product', 'product_color', 'product_size'));
    }

    public function productView($id)
    {
        $product    = Product::where('id', $id)->where('status', 1)->first();
        $cat = $product->category;
        $subcat = $product->subcategory;
        $bnd = $product->brand;

        // $product = DB::table('products')
        //     ->join('categories', 'products.category_id', 'categories.id')
        //     ->join('sub__categories', 'products.subcategory_id', 'sub__categories.id')
        //     ->join('brands', 'products.brand_id', 'brands.id')
        //     ->select('products.*', 'categories.category_name', 'sub__categories.subcategory_name', 'brands.brand_name')
        //     ->where('products.id', $id)->where('status', 1)->first();

        $color = explode(',', $product->product_colour);
        $size  = explode(',', $product->product_size);

        // return response()->json($product);

        return response()->json(array(
                'product' => $product,
                'cat'     => $cat,
                'subcat'     => $subcat,
                'bnd'     => $bnd,
                'color'   => $color,
                'size'    => $size,
            ));
    }

    //Category wise Product
    public function categoryProducts($id,$catname)
    {
        $categoryProducts    = Product::where('category_id', $id)->paginate(20);
        $brands              = Product::where('category_id', $id)->select('brand_id')->groupBy('brand_id')->get();
        $subcategoryproducts = Product::where('category_id', $id)->select('subcategory_id')->groupBy('subcategory_id')->get();
        return view('frontend.pages.category_products',compact('categoryProducts', 'brands', 'subcategoryproducts', 'catname'));
    }

    //Subcategory wise Product
    public function subCategoryProducts($id,$subcatname)
    {
        $subcatProduct = Product::where('subcategory_id', $id)->paginate(20);
        $brands         = product::where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();
        $categories    = Category::select('id', 'category_name')->get();
        return view('frontend.pages.subcategory_product', compact('subcatname','subcatProduct','categories','brands'));
    }

    public function productShop()
    {
        $brands        = Brand::all();
        $categories    = Category::all();
        $subcategories = Sub_Category::all();
        $products      = Product::where('status', 1)->paginate(15);
        return view('frontend.pages.shop_page', compact('products', 'categories', 'subcategories', 'brands'));
    }

}
