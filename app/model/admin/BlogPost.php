<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'post_category_id', 'image', 'post_title_en', 'post_title_bn', 'post_description_en', 'post_description_bn', 'status',
    ];

    public function postcategory()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }
}
