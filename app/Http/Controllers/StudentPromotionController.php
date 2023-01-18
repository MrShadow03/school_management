<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class StudentPromotionController extends Controller
{
    public function index(){
        return view('dashboard.pages.admin.promotion',[
            'sections' => Section::orderBy('class', 'asc')->get(),
        ]);
    }

    public function getSections(Request $request){

        if(Section::where('id',$request->section_id)->exists()){
            $class = Section::find($request->section_id)->class+1;
        }else{
            abort(404);
        }

        



        $sections = Section::where('class', $class)->exists() ? Section::where('class', Section::find($request->section_id)->class+1)->get() : "No Section Found!";
        return response()->json($sections);

    }
}
