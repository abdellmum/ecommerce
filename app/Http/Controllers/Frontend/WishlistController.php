<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Frontend\Wishlist;
use Auth;
use DB;
use Response;


class WishlistController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function wishlist(Request $request)
	{
		$userid = Auth::id();
		$productid = $request->product_id;
		if (Auth::check()) {
			$checkList = Wishlist::where('user_id', $userid)->where('product_id', $productid)->first();
			if ($checkList) {
				// json
				return response()->json(['error'=> 'This Produt Already Has your wishlist']);
			}else{
				$wishlist = New Wishlist();
				$wishlist->user_id = $userid;
				$wishlist->product_id = $productid;
				$wishlist->save();
				// json
				return response()->json(['success'=> 'Wishlist Added Successfully']);
			}
		}else{
			// json
			return response()->json(['error'=> 'Your Need To Login First']);
		}
	}

	//Wishlist Show
	// public function showWishlist()
	// {
	// 	$wishlist = Wishlist::all();
	// 	return view('frontend.pages.wishlist_show', compact('wishlist'));
	// }
	public function showWishlist()
    {
        $userid=Auth::id();
        $wishlist=DB::table('wishlists')->join('products','wishlists.product_id','products.id')
                          ->select('products.*','wishlists.user_id')
                          ->where('wishlists.user_id',$userid)
                          ->get();
        return view('frontend.pages.wishlist_show',compact('wishlist'));             
    }

	public function destroy($id)
    {
        $comment = Wishlist::find($id);
        $comment->delete();
        // Notification...
        $notification=array(
            'messege'=>'Your Comment Delete Successfully!',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

}
