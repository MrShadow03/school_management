<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Section;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request){
        //Getting the year and month from the request
        $date = isset($request->month) ? Carbon::parse($request->month) : Carbon::parse(Carbon::now());
        $year = $date->year;
        $month = $date->month;

        //Getting the student ids of the student of the section which belong to teacher
        $teacher_id = Auth::user()->id;
        $section_id = isset($request->section_id) ? $request->section_id : Section::where('teacher_id',$teacher_id)->first()->id;
        $students = Student::where('section_id',$section_id)->get();
        $student_ids = $students->pluck('id');

        $own_sections = Section::where('teacher_id',$teacher_id)->get();
        $other_sections = SubjectTeacher::with('section')->where('teacher_id',$teacher_id)->whereNotIn('section_id',$own_sections->pluck('id'))->get();

        //Getting the attendance of the students of the section
        $attendance = Attendance::with('student')->whereYear('date',$year)->whereMonth('date',$month)->whereIn('student_id',$student_ids)->get();

        //dd($attendance);
        
        return view('dashboard.pages.teacher.attendance_show',[
            'own_sections' => $own_sections,
            'other_sections' => $other_sections,
            'section' => Section::find($section_id),
            'attendances' => $attendance,
            'date' => $date,
            'students' => $students,
        ]);
    }

    public function create(Request $request){
        $teacher_id = Auth::user()->id;
        $section_id = $request->section_id ?? Section::where('teacher_id',$teacher_id)->first()->id;
        $students = Student::with(['section','attendances'])->where('section_id',$section_id)->get();
        $own_sections = Section::where('teacher_id',$teacher_id)->get();
        $other_sections = SubjectTeacher::with('section')->where('teacher_id',$teacher_id)->whereNotIn('section_id',$own_sections->pluck('id'))->get();

        return view('dashboard.pages.teacher.attendance',[
            'students' => $students,
            'own_sections' => $own_sections,
            'other_sections' => $other_sections,
            'section_name' => Section::find($section_id)->name,
        ]);
    }

    public function store(Request $request){

        $validation = $request->validate([
            'date' => 'required | date | before:tomorrow',
            'student_id' => 'required',
            'attendance' => 'required | boolean',
        ]);

        $attendance = Attendance::create($validation);
        return redirect()->back()->with('success','Attendance has been taken successfully');
    }

    public function destroy(Request $request){
        $date = Carbon::now()->format('Y-m-d');
        $attendance = Attendance::where('student_id', $request->id)->where('date', $date)->first();
        $attendance->delete();
        return redirect()->back()->with('success','Attendance has been deleted successfully');
    }
    
    public function update(Request $request){
        $date = Carbon::now()->format('Y-m-d');
        $row = Attendance::where('student_id', $request->id)->where('date', $date)->first();
        $attendance = !($row->attendance);
        $update = $row->update(['attendance' => $attendance]);
        return redirect()->back()->with('success','Attendance has been deleted successfully');
    }
    
    // public function filter(Request $request){
    //     //Getting the year and month from the request
    //     $date = Carbon::parse($request->month);
    //     $year = $date->year;
    //     $month = $date->month;

    //     //Getting the student ids of the student of the section which belong to teacher
    //     $teacher_id = Auth::user()->id;
    //     $section_id = $request->section_id ?? Section::where('teacher_id',$teacher_id)->first()->id;
    //     $student_ids = Student::where('section_id',$section_id)->get()->pluck('id');

    //     $own_sections = Section::where('teacher_id',$teacher_id)->get();
    //     $other_sections = SubjectTeacher::with('section')->where('teacher_id',$teacher_id)->whereNotIn('section_id',$own_sections->pluck('id'))->get();

    //     //Getting the attendance of the students of the section
    //     $attendance = Attendance::with('student')->whereYear('date',$year)->whereMonth('date',$month)->whereIn('student_id',$student_ids)->get();
    //     dd($attendance);
    //     die();
    //     return view('dashboard.pages.teacher.attendance_show',[
    //         'own_sections' => $own_sections,
    //         'other_sections' => $other_sections,
    //         'section' => Section::find($section_id),
    //         'attendances' => $attendance,
    //         'date' => $date,
    //     ]);
    // }
}
