<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cashier extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [

        'first_name',
        'last_name',
        'address',
        'NIC_no',
        'phone_no',
        'whatsapp_no',
        'IMG',
        'username',
        'password'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\CashierFactory::new();
    }
}
