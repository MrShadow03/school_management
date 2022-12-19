<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //return to all students view
    public function index()
    {
        return view('dashboard.pages.student.student_index', [
            'students' => Student::all()
        ]);
    }
}
