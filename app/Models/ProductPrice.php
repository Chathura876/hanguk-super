<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product_price extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'shop_id',
        'batch_no',
        'selling_price',
        'quantity',
        'inhouse_price',
        'discount_price'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\ProductPriceFactory::new();
    }
}
