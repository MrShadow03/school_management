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
            "section_id" => "required",
            "username" => "required | max:255",
            'student_image' => 'required|mimes:jpg,png,gif,jpeg|max:1024',
            'father_image' => 'required|mimes:jpg,png,gif,jpeg|max:1024',
            'mother_image' => 'required|mimes:jpg,png,gif,jpeg|max:1024',
        ],[
            "name.required" => "Student name is required.",
            "name.max" => "Student name is too long.",
            "birth_certificate_number.required" => "Birth certificate number is required.",
            "birth_certificate_number.max" => "Birth certificate number is too long.",
            "birth_date.required" => "Birth date is required.",
            "birth_date.date" => "Birth date is not valid.",
            "religion" => "Religion is required.",
            "gender" => "Gender is required.",
            "blood_group" => "Blood group is required.",
            "present_address" => "Present address is required.",
            "permanent_address" => "Permanent address is required.",
            "father_name" => "Father name is required.",
            "father_contact" => "Father contact is required.",
            "father_contact.min" => "Father contact is too short.",
            "father_contact.max" => "Father contact is too long.",
            "father_nid" => "Father NID is required.",
            "father_nid.min" => "Father NID is too short.",
            "father_nid.max" => "Father NID is too long.",
            "mother_name" => "Mother name is required.",
            "mother_contact" => "Mother contact is required.",
            "mother_contact.min" => "Mother contact is too short.",
            "mother_contact.max" => "Mother contact is too long.",
            "mother_nid" => "Mother NID is required.",
            "mother_nid.min" => "Mother NID is too short.",
            "mother_nid.max" => "Mother NID is too long.",
            "local_guardian_name" => "Local guardian name is required.",
            "local_guardian_contact" => "Local guardian contact is required.",
            "local_guardian_contact.min" => "Local guardian contact is too short.",
            "local_guardian_contact.max" => "Local guardian contact is too long.",
            "class.required" => "Class is required",
            "class_roll.required" => "Class roll is required",
            "section_id.required" => "Section is required",
            "username.required" => "Username is required",
            'student_image.required' => 'Student image is required',
            'student_image.mimes' => 'Image format is not supported. Please upload jpg, png, gif or jpeg image',
            'student_image.max' => 'Student image is too large',
            'father_image.required' => 'Father image is required',
            'father_image.mimes' => 'Image format is not supported. Please upload jpg, png, gif or jpeg image',
            'father_image.max' => 'Father image is too large',
            'mother_image.required' => 'Mother image is required',
            'mother_image.mimes' => 'Image format is not supported. Please upload jpg, png, gif or jpeg image',
            'mother_image.max' => 'Mother image is too large',
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

    public function getRoll(Request $request){
        $section_id = $request->section_id;
        $class_roll = Student::where('section_id', $section_id)->exists() ? Student::where('section_id', $section_id)->latest('class_roll')->get()->first()->class_roll+1 : 1;
        return response()->json($class_roll);
    }


}
