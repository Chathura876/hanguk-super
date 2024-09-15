<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'package_id',
        'date',
        're_payment_date'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\PaymentsFactory::new();
    }
}
