<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentResultController extends Controller
{
    public function index(Request $request){
        $student_id = Auth::user()->id;
        $section_id = $request->section_id ?? Auth::user()->section_id;
        $class = Section::find($section_id)->class;
        $results = Result::with(['student','subject'])->where('student_id', $student_id)->where('section_id', $section_id)->get();
        $mid_results = Result::with(['student','subject'])->where('student_id', $student_id)->where('section_id', $section_id)->where('type', 'mid')->get();
        $final_results = Result::with(['student','subject'])->where('student_id', $student_id)->where('section_id', $section_id)->where('type', 'final')->get();

        return view('dashboard.pages.student.result',[
            'results' => $results,
            'class' => $class,
            'section' => Section::find($section_id),
            'mid_results' => $mid_results,
            'final_results' => $final_results,
            'subjects' => Subject::where('class', $class)->get(),
        ]);
    }
}
