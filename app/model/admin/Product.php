<?php

namespace App\model\admin;

use App\User;
use App\model\Frontend\Comment;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    // protected $fillable = [
    //     'category_id',
    //     'subcategory_id',
    //     'brand_id',
    //     'product_name',
    //     'product_code',
    //     'product_quantity',
    //     'product_details',
    //     'product_colour',
    //     'product_size',
    //     'selling_price',
    //     'discount_price',
    //     'video_link',
    //     'main_slider',
    //     'hot_deal',
    //     'best_rated',
    //     'mid_slider',
    //     'hot_new',
    //     'trend',
    //     'bye_one_get_one',
    //     'image_one',
    //     'image_two',
    //     'image_three',
    //     'status'
    // ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Sub_Category::class, 'subcategory_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class); // un produit appartient a un seul utilisateur//

    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
