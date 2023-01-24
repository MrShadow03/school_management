<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class SingleStudentPromotionController extends Controller
{
    public function index(Request $request)
    {

        $section_id = $request->section_id ?? Section::orderBy('class', 'asc')->first()->id;
        $current_section = Section::find($section_id);
        $class = Section::find($section_id)->class;
        $available_sections = Section::where('class', $class)->exists() ? 
            Section::where('class', Section::find($section_id)->class + 1)->get() : "No Section Found!";

        //dd($available_sections);
        $promoted_section_id = $available_sections == "No Section Found!" || $available_sections->count() == 0 ? 0 : $available_sections->first()->id;

        //from result table get all the students whose section_id is equal to $request->section_id and new is 0
        $students = Result::with('student')->whereHas('student', function ($query) use ($section_id) {
            $query->where('section_id', $section_id)->where('new', 0);
        })->where('final_total', 1)->where('grade', 'F')->orderBy('total', 'desc')->get();

        //Promoted Students
        $promoted_students = Result::select('results.*')
            ->join('students', 'results.student_id', '=', 'students.id')
            ->where(function ($query) use ($promoted_section_id) {
                $query->where(function ($query) use ($promoted_section_id) {
                    $query->where('students.section_id', $promoted_section_id)->where('students.new', 1)->where('students.previous_roll', '!=', null);
                }
                )->orWhere(function ($query) use ($promoted_section_id) {
                    $query->where('students.section_id', $promoted_section_id)->where('results.final_total', 1)->where('results.grade', 'F');
                }
                    );
            })
            ->where('results.final_total', 1)
            ->orderBy('students.class_roll', 'asc')
            ->with('student')
            ->get();

        // dd($promoted_students);
        return view('dashboard.pages.admin.single_promotion', [
            'sections' => Section::orderBy('class', 'desc')->get(),
            'section' => $current_section,
            'class' => $class,
            'available_sections' => $available_sections,
            'promoted_section_id' => $promoted_section_id,
            'students' => $students,
            'promoted_students' => $promoted_students,
        ]);
    }

    public function update(Request $request)
    {
        $promoted_section_id = $request->promoted_section_id;

        $max_roll = Result::select('results.*')
            ->join('students', 'results.student_id', '=', 'students.id')
            ->where(function ($query) use ($promoted_section_id) {
                $query->where(function ($query) use ($promoted_section_id) {
                    $query->where('students.section_id', $promoted_section_id)->where('students.new', 1)->where('students.previous_roll', '!=', null);
                }
                )->orWhere(function ($query) use ($promoted_section_id) {
                    $query->where('students.section_id', $promoted_section_id)->where('results.final_total', 1)->where('results.grade', 'F');
                }
                    );
            })
            ->where('results.final_total', 1)
            ->orderBy('students.class_roll', 'asc')
            ->with('student')
            ->max('students.class_roll');

        //find the students whose id is in the request->student_id
        $student = Student::find($request->student_id);

        
        if($student->exists() && Section::find($request->promoted_section_id)->exists()){
            //update the previous_section_id
                $student->previous_section_id = $student->section_id;
                //update the section_id
                $student->section_id = $request->promoted_section_id;
                //update the class
                $student->class = Section::find($request->promoted_section_id)->class;
                //update the class_roll
                $student->previous_roll = $student->class_roll;
                //update the class_roll
                $student->class_roll = $max_roll + 1;
                //set the student as new
                $student->new = 1;
    
                //save the student
                $student->save();
        }else{
            echo "Student Not Found!";
        }

        //redirect back with success message and current section id and promotion section id
        return redirect()->back()->with('success', 'Student Promoted Successfully!');
    }
}