<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'shop_id'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\SubCategoryFactory::new();
    }
}
