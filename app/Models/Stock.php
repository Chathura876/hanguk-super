<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'qty',
        'stock_price',
        'selling_price',
        'discount_price',
        'free_item'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\StockFactory::new();
    }
    // Stock.php
    public function product()
    {
        return $this->belongsTo(Product::class, 'item_id'); // 'item_id' should match the foreign key in the stocks table
    }

}
