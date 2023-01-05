<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    //result belongs to student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    //result belongs to subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    //result belongs to teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    //result belongs to section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
