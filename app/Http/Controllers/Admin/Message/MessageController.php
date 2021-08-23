<?php

namespace App\Http\Controllers\Admin\Message;

use App\Http\Controllers\Controller;
use App\model\Frontend\Comment;
use App\model\frontend\Contact_Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $message = Contact_Message::all();
        return view('admin.message.contact_message_list', compact('message'));
    }

    public function show($id)
    {
        $showMessage = Contact_Message::where('id', $id)->first();
        return view('admin.message.message_show',compact('showMessage'));
    }

    public function destroy($id)
    {
        $message = Contact_Message::find($id);
        $message->delete();
        $notification=array(
                'messege'=>'User Message Delete Successfully.!',
                'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Product Comment List
    public function commentList()
    {
        $comments = Comment::orderBy('id', 'desc')->get();
        return view('admin.comment.comment_list', compact('comments'));
    }

    // Comment Show
    public function commentShow($id)
    {
        $comments = Comment::find($id);
        return view('admin.comment.comment_show', compact('comments'));
    }

    // Comment Active
    public function commentInactive($id)
    {
        $comments = Comment::find($id);
        $comments->status = 0;
        $comments->save();
        // Notification...
        $notification=array(
            'messege'=>'Inactive this Comment .',
            'alert-type'=>'warning'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }

    // Comment Inactive
    public function commentActive($id)
    {
        $comments = Comment::find($id);
        $comments->status = 1;
        $comments->save();
        // Notification...
        $notification=array(
            'messege'=>'Comment Active Successfully.',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }

    // Comment destroy
    public function commentDestroy($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        // Notification...
        $notification=array(
            'messege'=>'Comment Delete Successfully.',
            'alert-type'=>'success'
        );
        // Redirect.
        return Redirect()->back()->with($notification);
    }

}
