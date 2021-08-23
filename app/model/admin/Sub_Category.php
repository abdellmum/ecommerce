<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $fillable = [
        'category_id', 
        'subcategory_name',
        'subcategory_slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
