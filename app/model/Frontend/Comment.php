<?php

namespace App\model\Frontend;

use App\User;
use App\model\admin\Product;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'commentable_id', 'id');
    }
    
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
