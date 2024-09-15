<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'net_total',
        'pay_amount',
        'balance',
        'shop_id',
        'customer_id',
        'type',
        'date',
        'return_amount',
        'discount_amount',
        'update_by',
        'add_by',
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\OrderFactory::new();
    }
}
