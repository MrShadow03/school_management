<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.admin.doctors',[
            'doctors' => Doctor::with('department', 'assistant')->get(),
            'departments' => Department::all(),
            'assistants' => Student::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            "name" => "required",
            "department_id" => "required",
            "specialty" => "nullable",
            "contact_number" => "required| numeric| digits: 11",
            "visit_time" => "required",
            "designation" => "nullable",
            "student_id" => "nullable",
        ],[
            "student_id.required" => "The assistant field is required.",
        ]);

        Doctor::create([
            "name" => $request->name,
            "department_id" => $request->department_id,
            "specialty" => $request->specialty,
            "contact_number" => $request->contact_number,
            "visit_time" => $request->visit_time,
            "designation" => $request->designation,
            "student_id" => $request->student_id,
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Department created successfully');
    }

    public function changeStatus(Request $request)
    {
        $status = $request->status ? 0 : 1;
        Doctor::where('id', $request->id)->update(['status' => $status]);
        
        //redirect back with success message
        return redirect()->back()->with('success', 'Status changed successfully');
    }
}
