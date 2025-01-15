<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned extends Model
{
    use HasFactory;

    protected $table = 'assigned';

    protected $fillable = [
        'officer_id',
        'duty_id',
        'officer',
        'duty',
        'date',
        'code',
        'officerIndex',
        'dutyIndex'
    ];

    public function officer() {
        return $this->belongsTo(Officer::class, 'officer_id');
    }
}
