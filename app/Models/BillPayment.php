<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill_payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'balance',
        'given_money',
        'shop_id',
        'arrears_money',
        'type'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\BillPaymentFactory::new();
    }
}
