<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function create(Request $request){
        //if result type doesn't match settings permission then redirect back
        if($request->type == 'mid'){
            Setting::where('name','mid_result_uploading_permission')->first()->status ? '' : abort(404);
        }elseif($request->type == 'final'){
            Setting::where('name','final_result_uploading_permission')->first()->status ? '' : abort(404);
        }elseif($request->type == 'test'){
            Setting::where('name','test_result_uploading_permission')->first()->status ? '' : abort(404);
        }else{
            abort(404);
        }
        //Getting the student ids of the student of the section which belong to teacher
        $teacher_id = Auth::user()->id;
        $subject_query = SubjectTeacher::with('subject')
                                        ->leftJoin('sections', 'subject_teachers.section_id', '=', 'sections.id')
                                        ->orderBy('sections.class', 'asc');
        $subjects = $subject_query->get();
        $section = Section::find($request->section_id) ?? $subjects->first()->section;
        $subject = Subject::find($request->subject_id) ?? $subjects->first()->subject;

        $students = Student::where('section_id',$section->id)->get();

        return view('dashboard.pages.teacher.result_upload',[
            'subjects' => $subjects,
            'year' => $request->session,
            'type' => $request->type,
            'section' => $section,
            'subject' => $subject,
            'students' => $students,
        ]);
    }
}
