<?php

namespace App\model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'id',
        'order_id',
        'ship_name',
        'ship_email',
        'ship_phone',
        'ship_address',
        'ship_city',
        'ship_post_code',
    ];

}
