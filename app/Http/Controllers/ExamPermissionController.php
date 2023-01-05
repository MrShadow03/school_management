<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ExamPermissionController extends Controller
{
    public function index(){
        $permissions = Setting::whereIn('name',['mid_result_uploading_permission','final_result_uploading_permission','test_result_uploading_permission'])->get();

        return view('dashboard.pages.admin.exam_permission',[
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request){
        $validation = $request->validate([
            'status' => 'required|in:0,1'
        ]);

        if($request->status){
            $validation['year'] = date('Y');
        }

        Setting::where('id',$request->id)->update($validation);

        return back()->with('success','Permission updated successfully');
    }
    
}
