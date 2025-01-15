<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    use HasFactory;

    protected $fillable = [
        'duty'
    ];

    public function assignedDuties() {
        return $this->hasMany(Assigned::class, 'duty_id');
    }
}
