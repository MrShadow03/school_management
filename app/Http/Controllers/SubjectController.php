<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.admin.subject', [
            'subjects' => Subject::all()
        ]);
    }

    //store a new subject
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            //name should be unique in class and name
            'name' => 'required|unique:subjects,name,NULL,id,class,'.$request->class,
            'class' => 'required',
            'cq' => 'required|numeric',
            'mcq' => 'required|numeric',
            'practical' => 'nullable|numeric',
            'total_marks' => 'required|integer|in:' . ($request->cq + $request->mcq + $request->practical),
        ],[
            'name.required' => 'Subject name is required',
            'name.unique' => 'Subject name already exists',
            'class.required' => 'Class is required',
            'cq.required' => 'CQ is required',
            'cq.numeric' => 'CQ should be numeric',
            'mcq.required' => 'MCQ is required',
            'mcq.numeric' => 'MCQ should be numeric',
            'practical.numeric' => 'Practical should be numeric',
            'total_marks.required' => 'Total marks is required',
            'total_marks.integer' => 'Total marks should be integer',
            'total_marks.in' => 'Total marks should be equal to sum of CQ, MCQ and Practical',
        ])->validateWithBag('store');

        //return with withInput() to keep the form data
        //dd($validation);
        //return  $validation->fails() ? redirect()->back()->withInput($validation, 'form_store') : '';

        $subject = Subject::create($validation);

        return $subject?redirect()->back()->with('success', 'Subject added successfully'):redirect()->back()->with('error', 'Subject not added');
    }

    //update a subject
    public function update(Request $request, Subject $subject)
    {
        
        $validation = Validator::make($request->all(), [
            //name should be unique in class and name
            'name' => 'required|unique:subjects,name,'.$request->id.',id,class,'.$request->class,
            'class' => 'required',
            'cq' => 'required|numeric',
            'mcq' => 'required|numeric',
            'practical' => 'nullable|numeric',
            'total_marks' => 'required|integer|in:' . ($request->cq + $request->mcq + $request->practical),
        ],[
            'name.required' => 'Subject name is required',
            'name.unique' => 'Subject name already exists',
            'class.required' => 'Class is required',
            'cq.required' => 'CQ is required',
            'cq.numeric' => 'CQ should be numeric',
            'mcq.required' => 'MCQ is required',
            'mcq.numeric' => 'MCQ should be numeric',
            'practical.numeric' => 'Practical should be numeric',
            'total_marks.required' => 'Total marks is required',
            'total_marks.integer' => 'Total marks should be integer',
            'total_marks.in' => 'Total marks should be equal to sum of CQ, MCQ and Practical',
        ])->validateWithBag('update');

        $subject = $subject->where('id', $request->id)->update($validation);

        return $subject?redirect()->back()->with('success', 'Subject updated successfully'):redirect()->back()->with('error', 'Subject not updated');
    }

    //get subjects
    public function getSubjects(Request $request)
    {
        $subjects = Subject::where('class', $request->class)->get();
        return response()->json($subjects);
    }
    
    //get remaining subjects
    public function remainingSubjects(Request $request)
    {
        $class = Section::find($request->section_id)->class;
        $existingSubjects = SubjectTeacher::where('section_id', $request->section_id)->pluck('subject_id')->toArray();
        $subjects = Subject::where('class', $class)->whereNotIn('id', $existingSubjects)->get();
        return response()->json($subjects);
    }
}
