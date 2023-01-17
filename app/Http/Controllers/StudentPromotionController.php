<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentPromotionController extends Controller
{
    public function index(){
        return view('dashboard.pages.admin.promotion',[
            'sections' => Section::all(),
        ]);
    }
}
