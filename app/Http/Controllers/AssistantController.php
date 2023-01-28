<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Student;
use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.admin.assistants',[
            'assistants' => Student::all(),
            'doctors' => Doctor::all(),
        ]);
    }
}
