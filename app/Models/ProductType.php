<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'Description'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\ProductTypeFactory::new();
    }
}
