<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\model\Frontend\Comment;
use App\Http\Controllers\Controller;
use App\model\admin\Product;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        //Validation
        $validation = $request->validate([
            'comment'          => 'required',
        ]);

        $comment = new Comment;

        if (Auth::check()) {
            $comment->comment = $request->comment;

            $comment->user()->associate($request->user());

            $Product = Product::find($request->product_id);

            $Product->comments()->save($comment);

            // Notification...
            $notification=array(
                'messege'=>'Your Comment Successfully Send',
                'alert-type'=>'success'
            );
            return back()->with($notification);
            
        }else{
            // Notification...
            $notification=array(
                'messege'=>'At First, Login Your Account',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }
    }

    public function replyStore(Request $request)
    {
        //Validation
        $validation = $request->validate([
            'comment'          => 'required',
        ]);
        
        $reply = new Comment();

        if (Auth::check()) {
            $reply->comment = $request->get('comment');

            $reply->user()->associate($request->user());

            $reply->parent_id = $request->get('comment_id');

            $Product = Product::find($request->get('product_id'));

            $Product->comments()->save($reply);

            // Notification...
            $notification=array(
                'messege'=>'Your Replay Successfully Send',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }else{
            // Notification...
            $notification=array(
                'messege'=>'At First, Login Your Account',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }

    }

    public function destroyComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        // Notification...
        $notification=array(
            'messege'=>'Your Comment Delete Successfully!',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
