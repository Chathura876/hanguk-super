<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class package extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'name',
        'description'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\PackageFactory::new();
    }
}
