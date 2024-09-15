<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile'
    ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\AgentFactory::new();
    }
}
