<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentPromotionController extends Controller
{
    public function index(){
        return view('dashboard.pages.admin.promotion',[
            'sections' => Section::orderBy('class', 'desc')->get()
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

    public function rollBack(Request $request){
        //get all the students whose section id is $request->section_id and is new
        $students = Student::where('section_id', $request->section_id)->where('new', 1)->get();

        //loop through the students and update the section_id to previous_section_id, class to class-1 and class_roll to previous_roll, new to 0, previous_section_id to null, previous_roll to null
        foreach($students as $student){
            //update the section_id
            $student->section_id = $student->previous_section_id;
            //update the class
            $student->class = $student->class-1;
            //update the class_roll
            $student->class_roll = $student->previous_roll;
            //set the student as not new
            $student->new = 0;
            //update the previous_section_id
            $student->previous_section_id = null;
            //update the previous_roll
            $student->previous_roll = null;

            //save the student
            $student->save();
        }

        //roll back this sections failed students roll to the previous roll
        $failed_students = Student::where('section_id', $request->section_id)
                                    ->where('new', 0)
                                    ->where('previous_roll', '!=', null)
                                    ->where('previous_section_id', null)
                                    ->get();

        //loop through the students and update the class_roll and previous_roll 
        foreach($failed_students as $student){
            //update the class_roll
            $student->class_roll = $student->previous_roll;
            //update the previous_roll
            $student->previous_roll = null;

            //save the student
            $student->save();
        }


        //redirect back with success message
        return redirect()->back()->with('success', 'Students Roll Back Successfully!');
    }




















    public function getSections(Request $request){

        if(Section::where('id',$request->section_id)->exists()){
            $class = Section::find($request->section_id)->class+1;
        }else{
            abort(404);
        }

        //from result table get all the students whose section_id is equal to $request->section_id and new is 0
        $students = Result::with('student')->whereHas('student', function($query) use ($request) {
            $query->where('section_id', $request->section_id)->where('new', 0);
        })->where('final_total', 1)->orderBy('total', 'desc')->get();

        $sections = Section::where('class', $class)->exists() ? Section::where('class', Section::find($request->section_id)
                                                                        ->class+1)->whereDoesntHave('students', function($query){ return $query->where('new', 1);})->get() : "No Section Found!";
        
        return response()->json([
            'sections' => $sections,
            'students' => $students
        ]);

    }
}
