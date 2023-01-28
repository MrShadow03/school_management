<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // belongs to doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
