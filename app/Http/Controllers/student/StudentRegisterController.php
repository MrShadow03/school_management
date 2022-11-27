<?php

namespace App\Http\Controllers\student;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentParent;
use App\Http\Controllers\Controller;

class StudentRegisterController extends Controller
{
    public function create(Request $request){
        return view('dashboard.pages.student.register-student');
    }
    public function store(Request $request){

        //dd();
        // Validating the formdata
        //
        $validation = $request->validate([
            "name" => "required | max:255",
            "birth_certificate_number" => "required | max:50",
            "birth_date" => "required|date",
            "religion" => "required",
            "gender" => "required",
            "blood_group" => "required",
            "present_address" => "required",
            "permanent_address" => "nullable",
            "father_name" => "required",
            "father_contact" => "required | min:11 | max:11",
            "father_nid" => "nullable | min:8 | max:20",
            "mother_name" => "required | max:255",
            "mother_contact" => "required | min:11 | max:11",
            "mother_nid" => "nullable | min:8 | max:20",
            "local_guardian_name" => "required | max:255",
            "local_guardian_contact" => "required | min:11 | max:11",
            "class" => "required",
            "class_roll" => "required",
            "username" => "required | max:255",
            'student_image' => 'required|mimes:jpg,png,gif,jpeg|max:1024',
            'father_image' => 'required|mimes:jpg,png,gif,jpeg|max:1024',
            'mother_image' => 'required|mimes:jpg,png,gif,jpeg|max:1024',
        ]);

        
        // Creating password for student with username //
        //
        $validation['username'] = $request->username;
        $validation['password'] = bcrypt($request->username);
        
        // saving student and guardians images if has image //
        //
        $validation['student_image'] = $request->hasFile('student_image') ? $request->file('student_image')->store('student_images','public') : null;
        $validation['father_image'] = $request->hasFile('father_image') ? $request->file('father_image')->store('student_images','public') : null;
        $validation['mother_image'] = $request->hasFile('mother_image') ? $request->file('mother_image')->store('student_images','public') : null;

        // saving student data //
        //
        $student = Student::create($validation);
        
        // if student created successfully then create parents phone and password
        //
        if($student){
            $latest_student_id = Student::where('local_guardian_contact', $request->local_guardian_contact)->latest('id')->get()->first()->id;
            // attach exixting parent with student
            //
            if(count(StudentParent::where('phone_number', $request->local_guardian_contact)->get()) > 0){
                $parent_id = StudentParent::where('phone_number', $request->local_guardian_contact)->latest('id')->get()->first()->id;
                $attach_parent = Student::find($latest_student_id)->update([
                    'parent_id' => $parent_id
                ]);
                 //
                // ! sending sms to parent
                //
            // or else create parent account and attach with student.
            //
            }else{
                $parent = StudentParent::create([
                    'name' => $request->local_guardian_name,
                    'phone_number' => $request->local_guardian_contact,
                    'password' => bcrypt($request->local_guardian_contact),
                ]);

                // if parent created successfully then attach parent with student
                //
                if($parent){
                    $parent_id = StudentParent::where('phone_number', $request->local_guardian_contact)->latest('id')->get()->first()->id;
                    $attach_parent = Student::find($latest_student_id)->update([
                        'parent_id' => $parent_id
                    ]);

                    //
                    // ! sending sms to parent
                    //
                }
                //dd($parent);
            }

        }

        // redirecting to student profile page //
        //
        return $student?redirect()->back()->with('success','student created successfully!'): "Something went wrong!";

    }
}
