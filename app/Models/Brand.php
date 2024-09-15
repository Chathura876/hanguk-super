<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'IMG',
        'Company'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\BrandFactory::new();
    }
}
