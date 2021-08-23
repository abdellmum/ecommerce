<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_author',
        'meta_tag',
        'meta_description',
        'google_analytics',
        'bring_analytics',
    ];
}
