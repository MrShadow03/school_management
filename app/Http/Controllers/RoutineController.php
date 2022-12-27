<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    //show routines
    public function index(){
        return view('dashboard.pages.admin.routine',[
            'routines' => Routine::all(),
        ]);
    }
    
    //create routines
    public function create(){
        return view('dashboard.pages.admin.routine',[
            'routines' => Routine::with('section', 'subject')->get(),
        ]);
    }

    //store routines
    public function store(Request $request){
        $validation = $request->validate([
            'class' => 'required|numeric|min:1|max:12',
            'section_id' => 'required|numeric',
            'subject_id' => 'required|numeric|unique:routines,subject_id,NULL,id,section_id,'.$request->section_id.',day,'.$request->day,
            'day' => 'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
            'start_time' => 'required|date_format:H:i|unique:routines,start_time,NULL,id,section_id,'.$request->section_id.',day,'.$request->day,
        ], [
            'subject_id.unique' => 'এই বিষয় ইতিমধ্যে এই দিনের জন্য বিদ্যমান',
            'start_time.unique' => 'এই সময় ইতিমধ্যে এই দিনের জন্য বিদ্যমান',
            'start_time.date_format' => 'সঠিক সময় ফরম্যাট দিন',
            'class.min' => 'সঠিক শ্রেণী নাম্বার দিন',
        ]);

        $create_routine = Routine::create($validation);
        $routines = Routine::with('section', 'subject')->get();

        //if routine created successfully then return response with all routines else return error
        return $create_routine?response()->json($routines):redirect()->back()->with('error', 'Routine not added');
    }
}
