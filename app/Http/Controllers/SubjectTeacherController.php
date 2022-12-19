<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use Illuminate\Validation\Rule;

class SubjectTeacherController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.admin.subject-teacher',[
            'subjects' => SubjectTeacher::with(['section', 'subject', 'teacher'])->orderBy('class', 'ASC')->get(),
            'teachers' => Teacher::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'section_id' => 'required',
            'subject_id' => 'required|unique:subject_teachers,subject_id,'.$request->id.',id,section_id,'.$request->section_id,
            'teacher_id' => ['required'],
            'class' => 'required',
        ]);

        $subject_teacher = SubjectTeacher::create($validation);

        return $subject_teacher?redirect()->back()->with('success', 'Subject Teacher Added Successfully'):redirect()->back()->with('error', 'Something Went Wrong');
    }

    public function update(Request $request)
    {
        dd($request);
        die();
        $validation = $request->validate([
            'section_id' => 'required',
            'subject_id' => 'required|unique:subject_teachers,subject_id,'.$request->id.',id,section_id,'.$request->section_id,
            'teacher_id' => ['required'],
            'class' => 'required',
        ]);

        $subject_teacher = SubjectTeacher::find($request->id)->update($validation);

        return $subject_teacher?redirect()->back()->with('success', 'Subject Teacher Updated Successfully'):redirect()->back()->with('error', 'Something Went Wrong');
    }
}
