<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentResultController extends Controller
{
    public function index(){
        $student_id = Auth::user()->id;
        $section_id = $request->section_id ?? Auth::user()->section_id;
        $class = Section::find($section_id)->class;
        $results = Result::where('student_id', $student_id)->where('section_id', $section_id)->get();

        return view('dashboard.pages.student.result',[
            'results' => $results,
            'class' => $class,
            'section' => Section::find($section_id),
        ]);
    }
}
