<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\AdminFactory::new();
    }
}
