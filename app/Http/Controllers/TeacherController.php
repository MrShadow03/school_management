<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectTeacher;

class TeacherController extends Controller
{
    public function assignSubjectTeacher()
    {
        return view('dashboard.pages.admin.subject-teacher',[
            'subjects' => SubjectTeacher::all(),
        ]);
    }
}
