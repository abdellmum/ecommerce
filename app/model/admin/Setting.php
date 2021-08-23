<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'vat', 
        'shipping_charge',
        'logo',
        'shop_name',
        'email',
        'phone',
        'address',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'vimeo_url',
        'copyright'
    ];
}
