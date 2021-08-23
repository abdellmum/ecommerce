<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = [
        'coupon' , 'discount'
    ];
}
