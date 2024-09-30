<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrnBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'net_total',
        'discount',
        'pay_amount',
        'balance',
        'company_name',
        'date',
        'payment_type',
        'add_by'
    ];
}
