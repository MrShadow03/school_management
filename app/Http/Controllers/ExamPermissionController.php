<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'status' => 'required|in:0,1',
            // 'expire_date' => 'required_if:status,1|date|after_or_equal:today'
        ]);

        //set the year to current year and expire date to 15 days from now if permission is active
        if($request->status){
            $validation['year'] = date('Y');
            $validation['expire_date'] = Carbon::now()->addDays(15);;
        }

        //if the permission is inactive, set the expire date to null
        if(!$request->status){
            $validation['expire_date'] = null;
        }



        Setting::where('id',$request->id)->update($validation);

        return back()->with('success','Permission updated successfully');
    }
    
}
