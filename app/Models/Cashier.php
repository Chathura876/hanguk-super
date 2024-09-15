<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cashier extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',
        'last_name',
        'address',
        'NIC_no',
        'phone_no',
        'whatsapp_no',
        'img',
        'username',
        'password'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\CashierFactory::new();
    }
}
