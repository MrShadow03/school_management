<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    // belongs to department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // has many appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // belongs to student
    public function assistant()
    {
        return $this->belongsTo(Student::class);
    }
}
