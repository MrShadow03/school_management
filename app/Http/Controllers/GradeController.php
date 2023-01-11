<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(){
        return view('dashboard.pages.admin.grade',[
            'grades' => Grade::where('name', '!=', 'F')->get(),
        ]);
    }

    public function update(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'score' => 'required|min:33|max:100|numeric',
            'comment' => 'required',
        ]);

        $update = Grade::where('name', $request->name)->update($data);

        return $update ? back()->with('success', 'Grade updated successfully') : back()->with('error', 'Grade update failed');
    }
}
