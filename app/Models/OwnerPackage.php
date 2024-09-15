<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner_package extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'package_id',
        'owner_id'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\OwnerPackageFactory::new();
    }
}
