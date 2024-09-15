<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spend_money extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'description',
        'by',
        'date',
        'shop_id'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\SpendMoneyFactory::new();
    }
}
