<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'stock_id',
        'shop_id',
        'quantity',
        'date',
        'price',
        'discount_price',
        'sub_total',
        'profit',
        'free_item'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\OrderItemFactory::new();
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }


}
