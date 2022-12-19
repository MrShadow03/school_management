<?php

namespace App\Http\Controllers\teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherRegisterController extends Controller
{
    public function create(Request $request){
        return view('dashboard.pages.teacher.register-teacher');
    }
    public function store(Request $request){
        
        $validation = $request->validate([
            "name" => "required | max:255",
            "nid_number" => "required | max:50",
            "phone_number" => "required | max:11 | min:11 | unique:teachers",
            "birth_date" => "required|date",
            "religion" => "required",
            "gender" => "required",
            "blood_group" => "required",
            "present_address" => "required",
            "permanent_address" => "nullable",
            "major" => "required",
            "education" => "required",
            'teacher_image' => 'required|mimes:jpg,png,gif,jpeg|max:1024',
        ]);

        
        // Creating password for teacher //
        //
        $validation['password'] = bcrypt('pass@'.$request->phone_number);
        
        // saving teacher images if has image //
        //
        $validation['teacher_image'] = $request->hasFile('teacher_image') ? $request->file('teacher_image')->store('teacher_image','public') : null;

        // saving teacher data //
        //
        $teacher = Teacher::create($validation);
        
        //! sending sms to teacher //
        //

        return $teacher?redirect()->back()->with('success','student created successfully!'): "Something went wrong!";

    }
}
