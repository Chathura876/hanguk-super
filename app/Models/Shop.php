<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop',
        'address',
        'email',
        'mobile',
        'tenant_id',
        'logo',
        'description'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\ShopFactory::new();
    }
}
