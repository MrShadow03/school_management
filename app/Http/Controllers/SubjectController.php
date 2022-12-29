<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;

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
        $validation = $request->validate([
            //name should be unique in class and name
            'name' => 'required|unique:subjects,name,'.$request->id.',id,class,'.$request->class,
            'class' => 'required',
        ]);

        $subject = Subject::create($validation);

        return $subject?redirect()->back()->with('success', 'Subject added successfully'):redirect()->back()->with('error', 'Subject not added');
    }

    //update a subject
    public function update(Request $request, Subject $subject)
    {

        $validation = $request->validate([
            //name should be unique in class and name
            'name' => 'required|unique:subjects,name,'.$request->id.',id,class,'.$request->class,
            'class' => 'required',
        ]);

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
