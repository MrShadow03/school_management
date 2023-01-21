<?php

namespace App\Http\Controllers\teacher;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TeacherSectionController extends Controller
{
    //show students list
    public function index(Request $request)
    {
        $all_sections = Section::where('teacher_id',$request->teacher_id)->orderBy('class','desc')->get() ?? 'No section found';
        $section = $request->section_id;
        $students = $section? Student::where('section_id',$section)->orderBy('class_roll')->get() : Student::whereIn('section_id',$all_sections->pluck('id'))->orderBy('class')->get();


        //if section exsists then get the students where section_id is equal to section ids
        return view('dashboard.pages.teacher.students',[
            'students' => $students,
            'all_sections' => $all_sections
        ]);
    }
}
