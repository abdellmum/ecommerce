<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Http\Controllers\Controller;
use App\model\admin\Brand;
use App\model\admin\Product;
use App\model\admin\Sub_Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Product Search By Ajax
    public function productSearch(Request $request)
    {
        $search   = $request->product_title;
        $products = Product::where('product_name', 'LIKE', '%' . $search . '%')
            ->where('status', 1)->get();
        return view('frontend.pages.search.search_live_result', compact('products'));
    }

    // Search By page Load
    public function productSearchResuit(Request $request)
    {
        $brands          = Brand::select('brand_name')->get();
        $subcategory     = Sub_Category::select('subcategory_name')->get();
        $search_keyword  = $request->search;
        $search_products = DB::table('products')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'brands.brand_name')
            ->where('product_name', 'LIKE', '%' . $search_keyword . '%')
            ->orWhere('brand_name', 'LIKE', '%' . $search_keyword . '%')
            ->paginate(15);
        return view('frontend.pages.search.search_resuit', compact('brands', 'subcategory', 'search_keyword', 'search_products'));
    }

}
