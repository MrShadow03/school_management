<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Routine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
