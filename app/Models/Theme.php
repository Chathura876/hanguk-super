<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'JS',
        'CSS',
        'color',
        'shop_id'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\ThemeFactory::new();
    }
}
