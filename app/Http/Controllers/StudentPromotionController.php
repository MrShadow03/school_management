<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentPromotionController extends Controller
{
    public function index(){
        return view('dashboard.pages.admin.promotion',[
            'sections' => Section::orderBy('class', 'desc')->get()
        ]);
    }

    public function getSections(Request $request){

        if(Section::where('id',$request->section_id)->exists()){
            $class = Section::find($request->section_id)->class+1;
        }else{
            abort(404);
        }

        //from result table get all the students whose section_id is equal to $request->section_id and new is 0

        $students = Result::with('student')->whereHas('student', function($query) use ($request) {
            $query->where('section_id', $request->section_id)->where('new', 0);
        })->where('final_total', 1)->orderBy('total', 'desc')->get();

        $sections = Section::where('class', $class)->exists() ? Section::where('class', Section::find($request->section_id)->class+1)->get() : "No Section Found!";
        return response()->json([
            'sections' => $sections,
            'students' => $students
        ]);

    }
}
