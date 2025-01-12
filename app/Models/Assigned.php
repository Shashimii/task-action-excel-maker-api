<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned extends Model
{
    use HasFactory;

    protected $fillable = [
        'officerId',
        'dutyId',
        'offiicer',
        'duty',
        'date',
        'code',
        'officerIndex',
        'dutyIndex'
    ];
}
