<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(){
        return view('dashboard.pages.admin.section',[
            'sections' => Section::with('teacher')->get(),
            'teachers' => Teacher::all(),
        ]);
    }
    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required|unique:sections',
            'class' => 'required',
            'teacher_id' => 'required',
        ]);

        // change the name to capitalize
        $request->name = ucwords($request->name);

        $section = Section::create($validation);
        return $section?redirect()->back()->with('success','Section Added Successfully'):redirect()->back()->with('error','Something Went Wrong');
    }
    
    public function update(Request $request){
        $validation = $request->validate([
            'name' => 'required|unique:sections,name,'.$request->section_id,
            'class' => 'required',
            'teacher_id' => 'required',
        ]);

        // change the name to capitalize
        $request->name = ucwords($request->name);

        $section = Section::find($request->section_id)->update($validation);
        return $section?redirect()->back()->with('success','Section Updated Successfully'):redirect()->back()->with('upadate_error','Something Went Wrong');
    }

    public function getSections(Request $request){
        $sections = Section::where('class',$request->class)->get();
        return response()->json($sections);
    }

    public function axios(Request $request){
        $a = Section::where('name',$request->name)->get();
        return response()->json($a);

        //get all the student data who is in class 3
        // $students = Student::whereHas('section',function($query){
        //      $query->where('class',3);
        // })->get();
    }
}
