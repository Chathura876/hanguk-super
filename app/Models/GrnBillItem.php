<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrnBillItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'grn_id',
        'item_id',
        'product_name',
        'stock_price',
        'selling_price',
        'discount_price',
        'qty',
        'free_item',
        'sub_total'
    ];
}
