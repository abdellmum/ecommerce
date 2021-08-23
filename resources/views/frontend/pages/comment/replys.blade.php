@foreach($comments as $comment)
    @if ($comment->status == 1)
        <div class="display-comment">
            <div class="row" style="margin-top: 2%;">
                <div class="image_area" style="margin: 3px 10px 0px 17px;">
                    <img src=" @if (isset($comment->user->image)){{ asset('users/'. $comment->user->image) }}
                        @else {{ asset('frontend/images/adv_1.png') }} @endif" alt="" style="width: 45px; margin: 0 auto; border-radius: 50%; border: 2px solid #ddd;">
                </div>
                <div class="comment_area">
                    <strong>{{ $comment->user->name }}</strong>
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
            <form method="post" action="{{ route('reply.add') }}">
                @csrf
                @if (Auth::check())
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" />
                        <input type="hidden" name="product_id" value="{{ $product_id }}" />
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
                        @if (auth()->user()->id == $comment->user_id)
                            <a href="{{ route('comment.delete', $comment->id) }}" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;"><i class="fa fa-trash" title="delete"></i></a>
                        @else
                        @endif   
                    </div>
                @else
                @endif
            </form>
            @include('frontend.pages.comment.replys', ['comments' => $comment->replies])
        </div>
    @else
        
    @endif
@endforeach 