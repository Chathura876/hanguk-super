<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garbage_things extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'date',
        'quantity',
        'shop_id'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\GarbageThingsFactory::new();
    }
}
