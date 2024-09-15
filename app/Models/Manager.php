<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manager extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'nic_no',
        'phone',
        'email',
        'address',
        'password'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\ManagerFactory::new();
    }
}
