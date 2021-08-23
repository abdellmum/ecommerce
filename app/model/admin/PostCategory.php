<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'category_name_en', 'category_name_bn',
    ];
}
