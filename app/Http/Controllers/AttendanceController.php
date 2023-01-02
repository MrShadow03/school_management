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
}
