<?php

namespace App\model\Frontend;

use App\model\admin\Product;
use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'color',
        'size',
        'qty',
        'single_price',
        'total_price',
    ];
    
    // belongs to product.. 
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
