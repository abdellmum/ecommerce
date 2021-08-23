<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name', 'brand_logo', 'brand_slug'
    ];
}
