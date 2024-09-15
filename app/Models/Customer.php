<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'nic',
        'birthday',
        'phone',
        'email',
        'shop_id',
        'card_no',
        'type',
        'status'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\CustomerFactory::new();
    }
}
