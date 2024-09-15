<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shop_id'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\CategoryFactory::new();
    }
}
