<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'second_name',
        'user_name',
        'password',
        'nic',
        'email',
        'add_by',
        'referral_no',
        'img'
    ];

//    protected static function newFactory()
//    {
//        return \Modules\SuperMarketPos\Database\factories\OwnerFactory::new();
//    }
}
