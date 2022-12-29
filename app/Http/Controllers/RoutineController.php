<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    //show routines
    public function index(Request $request){
        $section_id = $request->id ?? Section::first()->id;
        
        //if user is student then the section_id is authenticated student's section_id
        $section_id = Auth::guard('student')->check() ? auth()->user()->section_id : $section_id;

        $times = Routine::where('section_id', $section_id)->distinct()->orderBy('start_time', 'asc')->pluck('start_time');
        return view('dashboard.pages.admin.routine_show',[
            'routine' => Routine::with('section', 'subject')->where('section_id', $section_id)->get(),
            'all_sections' => Section::orderBy('class', 'asc')->get(),
            'times' => $times,
        ]);
    }

    //teachers routine
    public function teacherRoutine(){
        $subject_teacher_of = SubjectTeacher::where('teacher_id', Auth::user()->id)->get(['subject_id', 'section_id'])->toArray();
        $query = Routine::with('section', 'subject')->whereIn('section_id', array_column($subject_teacher_of, 'section_id'))->whereIn('subject_id', array_column($subject_teacher_of, 'subject_id'));
        $routine = $query->get();
        $times = $query->distinct()->orderBy('start_time', 'asc')->pluck('start_time');

        return view('dashboard.pages.teacher.routine',[
            'routine' => $routine,
            'times' => $times,
        ]);
    }
    
    //create routines
    public function create(){
        return view('dashboard.pages.admin.routine',[
            'routines' => Routine::with('section', 'subject')->paginate(10),
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
        $routines = Routine::with('section', 'subject')->latest('id')->paginate(10);

        //if routine created successfully then return response with all routines else return error
        return $create_routine?response()->json($routines):redirect()->back()->with('error', 'Routine not added');
    }

    //delete routine
    public function destroy($id){
        $routine = Routine::find($id);
        $routine->delete();
        return redirect()->back()->with('success', 'Routine deleted successfully');
    }
}
