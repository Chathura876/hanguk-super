<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'mobile',
        'address',
        'logo',
        'footer_title',
        'header_title',
        'header_subtitle',
        'footer_subtitle',
        'printer_size'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\BillDetailsFactory::new();
    }
}
