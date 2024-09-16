<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Damage_items extends Model
{
    use HasFactory;

     protected $fillable = [
         'product_id',
         'stock_id',
         'product_name',
         'date',
         'quantity',
         'add_by'
     ];
}
