<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    public function create(Request $request){
        $year = $request->session ?? date('Y');
        $type = $request->type;
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
        $section_id = $section->id;
        $subject_id = $subject->id;

        $students = Student::whereDoesntHave('result', function($query) use($year, $type, $section_id, $subject_id){
            $query->where('year', $year)->where('type', $type)->where('section_id', $section_id)->where('subject_id', $subject_id);
        })->where('section_id',$section->id)->get();

        return view('dashboard.pages.teacher.result_upload',[
            'subjects' => $subjects,
            'year' => $request->session,
            'type' => $request->type,
            'section' => $section,
            'subject' => $subject,
            'students' => $students,
            'current_subject_id' => $request->subject_id ?? $subjects->first()->subject->id,
            'current_section_id' => $request->section_id ?? $subjects->first()->section->id,
        ]);
    }

    public function store(Request $request){
        //default max marks
        $max_cq = 0;
        $max_mcq = 0;
        $max_practical = 0;

        //if subject id is set then get max marks from subject table
        if($request->has('subject_id')){
            $max_cq = Subject::find($request->subject_id)->cq;
            $max_mcq = Subject::find($request->subject_id)->mcq;
            $max_practical = Subject::find($request->subject_id)->practical;
        }

        //put new old value to session
        $request->session()->put('student_id_'.$request->student_id, $request->student_id);

        //validation
        $validation = Validator::make($request->all(),[
            'subject_id' => 'required',
            'student_id' => 'required',
            'section_id' => 'required',
            'cq_'.$request->student_id => 'required|numeric|max:'.$max_cq,
            'mcq_'.$request->student_id => 'nullable|numeric|max:'.$max_mcq,
            'practical_'.$request->student_id => 'nullable|numeric|max:'.$max_practical,
            'year' => 'required|numeric|digits:4',
            'type' => 'required|max:10',
        ],[
            'cq_'.$request->student_id.'.max' => 'CQ marks should be less than or equal to '.$max_cq,
            'mcq_'.$request->student_id.'.max' => 'MCQ marks should be less than or equal to '.$max_mcq,
            'practical_'.$request->student_id.'.max' => 'Practical marks should be less than or equal to '.$max_practical,
        ])->validateWithBag('form'.$request->student_id);

        //if the result is already uploaded then redirect back
        $result = Result::where('subject_id',$request->subject_id)
                        ->where('student_id',$request->student_id)
                        ->where('section_id',$request->section_id)
                        ->where('year',$request->year)
                        ->where('type',$request->type)
                        ->exists();
        $result ? abort(404) : '';

        //Refined data to match with database column
        $data = [
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'section_id' => $request->section_id,
            'cq' => $request->input('cq_'.$request->student_id),
            'mcq' => $request->input('mcq_'.$request->student_id),
            'year' => $request->year,
            'type' => $request->type,
        ];

        //if practical or mcq is set then add to data array
        $request->has('mcq_'.$request->student_id) ? $data['mcq'] = $request->input('mcq_'.$request->student_id) : '';
        $request->has('practical_'.$request->student_id) ? $data['practical'] = $request->input('practical_'.$request->student_id) : '';


        //dd($validation);
        $result = Result::create($data);

        return $result? back()->with('success','Result added successfully') : back()->with('error','Something went wrong');
    }
}