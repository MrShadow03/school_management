<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SingleStudentPromotionController extends Controller
{
    public function index(Request $request){
        
        $current_section = $request->section_id ?? Section::orderBy('class', 'asc')->first()->id;
        $class = Section::find($current_section)->class;


        return view('dashboard.pages.admin.single_promotion',[
            'sections' => Section::orderBy('class', 'desc')->get(),
            'section' => $current_section,
            'class' => $class,
        ]);
    }

    public function update(Request $request){

        $students = Result::with('student')->whereHas('student', function($query) use ($request) {
            $query->where('section_id', $request->current_section)->where('new', 0);
        })->where('final_total', 1)->where('grade', '!=' ,'F')->orderBy('total', 'desc')->get()->pluck('student');

        //set class_roll to 1
        $class_roll = 1;
        //loop through the students and update the section_id, class and class_roll
        foreach($students as $student){
            //update the previous_section_id
            $student->previous_section_id = $student->section_id;
            //update the section_id
            $student->section_id = $request->promotion_section;
            //update the class
            $student->class = Section::find($request->promotion_section)->class;
            //update the class_roll
            $student->previous_roll = $student->class_roll;
            //update the class_roll
            $student->class_roll = $class_roll;
            //set the student as new
            $student->new = 1;

            //save the student
            $student->save();

            //increment the class_roll
            $class_roll++;
        }

        //set promoted sections failed students roll after the last promoted student
        $failed_students = Result::with('student')->whereHas('student', function($query) use ($request) {
            $query->where('section_id', $request->promotion_section)->where('new', 0);
        })->where('final_total', 1)->where('grade', 'F')->orderBy('total', 'desc')->get()->pluck('student');

        //loop through the students and update the class_roll and previous_roll
        foreach($failed_students as $student){
            //update the previous_roll
            $student->previous_roll = $student->class_roll;
            //update the class_roll
            $student->class_roll = $class_roll;

            //save the student
            $student->save();

            //increment the class_roll
            $class_roll++;
        }

        //redirect back with success message and current section id and promotion section id
        return redirect()->back()->with('success', 'Students Promoted Successfully!')->with('current_section', $request->current_section)->with('promotion_section', $request->promotion_section);
    }
}
