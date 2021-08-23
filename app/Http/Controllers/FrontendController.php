<?php

namespace App\Http\Controllers;

use App\model\admin\Brand;
use App\model\admin\Product;
use Illuminate\Http\Request;
use App\model\admin\Category;
use App\model\Frontend\Comment;
use App\model\Frontend\Order;
use phpDocumentor\Reflection\Types\Null_;

class FrontendController extends Controller
{
    public function index()
    {

        // Banner Product..
        $main_slide         = Product::where('main_slider', 1)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->first();
        // Deals of the Week
        $hot_deal           = Product::where('hot_deal', 1)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
        // Fetured Product..
        $featured           = Product::where('status', 1)->whereNotIn('product_quantity', [0])->orderBy('id', 'desc')->limit(24)->get();
        // On Sale Product..
        $trends             = Product::where('trend', 1)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        // Best Rated Product..
        $best_rated         = Product::where('best_rated', 1)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        // Popular Categories....
        $category           = Category::inRandomOrder()->limit(10)->get();;
        //Mid Banner
        $mid_slider         = Product::where('mid_slider', 1)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        //Discont product
        $discout_product    = Product::whereNotNull('discount_price')->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->first();
        // Electronic Devices..
        $elec_cat = Category::skip(0)->first();
        $elec_id = $elec_cat->id;
        $electronic = Product::where('category_id', $elec_id)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->get();
        // Men's Fashion ..
        $mans_pa = Category::skip(6)->first();
        $mans_id = $mans_pa->id;
        $mans_passion = Product::where('category_id', $mans_id)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->get();
        
        $womans_pa = Category::skip(5)->first();
        $womans_id = $womans_pa->id;
        $womans_passion = Product::where('category_id', $womans_id)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->get();
        // Top 20
        $top20 = Product::where('selling_price', '>', 500)->whereNotIn('product_quantity', [0])->where('status', 1)->limit(24)->orderBy('id', 'desc')->get();
        // Electronic & Home Accessories
        $elect_acc = Category::skip(1)->first();
        $home_acc = Category::skip(2)->first();
        $electro_home_accesso = Product::where('category_id', $elect_acc->id)->orWhere('category_id', $home_acc->id)->whereNotIn('product_quantity', [0])
                                ->where('status', 1)->limit(24)->orderBy('id', 'desc')->get();
        // Sports & Automotive
        $sports_cat  = Category::skip(8)->first();
        $automotive_cat  = Category::skip(9)->first();
        $sports_automotive = Product::where('category_id', $sports_cat->id)->orWhere('category_id', $automotive_cat->id)->whereNotIn('product_quantity', [0])
                            ->where('status', 1)->limit(24)->orderBy('id', 'desc')->get();
        // Hot new Product..
        $hot_new        = Product::where('hot_new', 1)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
        //Bye One Get One
        $ByeGet         = Product::where('bye_one_get_one', 1)->whereNotIn('product_quantity', [0])->where('status', 1)->orderBy('id', 'desc')->limit(24)->get();
        // Latest Reviews
        $reviewProduct = Comment::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        // Recently Viewed
        $random_products = Product::where('status', 1)->inRandomOrder()->limit(10)->get();
        // Brand Logo Show
        $brandlogo = Brand::all();

        return view('frontend.pages.index',compact('main_slide', 'hot_deal', 'featured', 'trends', 'best_rated',
            'category', 'mid_slider', 'discout_product', 'electronic', 'mans_passion', 'womans_passion', 'top20',
            'electro_home_accesso', 'sports_automotive', 'hot_new', 'ByeGet', 'reviewProduct', 'random_products',
            'brandlogo'
        ));
    }

    public function trakOrder(Request $request)
    {
        $code = $request->status_code;

        $check = Order::where('status_code', $code)->first();

        if ($check) {
            return view('frontend.pages.order.track_order', compact('check'));
        }else{
            // Notification
            $notification=array(
                'messege'=>'Your Order Code Invalid !',
                'alert-type'=>'error'
            );
            // Redirect
            return redirect()->back()->with($notification);
        }

    }

}
