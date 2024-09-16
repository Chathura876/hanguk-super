<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    protected $fillable=
        [
            'number',
            'bank',
            'company',
            'amount',
            'issued_date',
            'written_date',
            'collect_by',
            'status'
        ];
}
