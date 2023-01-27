<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    //payment creation by the teachers
    public function create(Request $request){
        //check if the account is active
        $isAccountActive = Account::where('id', $request->account_id)->exists() ? Account::find($request->account_id)->status : 0;
        //abort if the account is not active
        $isAccountActive ? '' : abort(403, 'This fee collection is not active right now.');

        //all the sections that belongs to the current user
        $sections = Section::where('teacher_id', auth()->user()->id)->exists() ? Section::where('teacher_id', auth()->user()->id)->orderBy('class', 'asc')->get() : abort(403, 'You are not assigned to any section yet.');

        //check if request has section_id or set default
        $section_id = $request->section_id ?? Section::where('teacher_id', auth()->user()->id)->orderBy('class', 'asc')->first()->id;

        //get the student_ids of the students of the section from payments table where the last payment is not within the current month and current account
        $student_ids = Payment::where('account_id', $request->account_id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->pluck('student_id')->toArray();

        //get the students of the section
        $students = Student::where('section_id', $section_id)->whereNotIn('id', $student_ids)->orderBy('class_roll', 'asc')->get();

        return view('dashboard.pages.teacher.collect_payments', [
            'account' => Account::find($request->account_id),
            'current_section' => Section::find($section_id),
            'sections' => $sections,
            'students' => $students,
        ]);
    }

    //payment store by the teachers
    public function store(Request $request){
        //check if the account is active
        $isAccountActive = Account::where('id', $request->account_id)->exists() ? Account::find($request->account_id)->status : 0;
        //abort if the account is not active
        $isAccountActive ? '' : abort(403, 'This fee collection is not active right now.');
        
        $max_amount = Account::find($request->account_id)->total;
        //validate the request
        $validation = Validator::make($request->all(), [
            'account_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'teacher_id' => 'required|numeric',
            'amount' => 'required|numeric|max:'.$max_amount,
        ])->validateWithBag($request->student_id);

        //store the payments
        $payment = Payment::create($validation);

        return $payment ? back()->with('success', 'Payment collected successfully.') : back()->with('error', 'Something went wrong.');
    }
}
