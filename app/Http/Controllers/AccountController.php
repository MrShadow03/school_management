<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('dashboard.pages.admin.account',[
            'accounts' => Account::all()
        ]);
    }
    
    public function create(){
        return view('dashboard.pages.admin.account_create');
    }
    
    public function store(Request $request){        
        //data validation
        $validation = $request->validate([
            'name' => 'required|max:255',
            'classes' => 'required| min:1| array| in:1,2,3,4,5,6,7,8,9,10',
            'total' => 'required| numeric',
        ]);

        //number of key, value pair in array
        $number_of_key_value_pairs = (int)$request->number_of_key_value_pairs;

        //pushing the key value pair into an array
        $key_value_pair = [];
        for($i = 1; $i <= $number_of_key_value_pairs; $i++){
            $key_value_pair[$request->input('key'.$i)] = $request->input('value'.$i);
        }

        //json encode the array
        $validation['expenses'] = json_encode($key_value_pair);

        //json ecnoding the classes array
        $validation['classes'] = json_encode($validation['classes']);

        //insert into database
        $create = Account::create($validation);

        //if success redirect to account page with success message else redirect back with error message
        return $create ? redirect()->route('admin.account.index')->with('success', 'Account created successfully') : redirect()->back()->with('error', 'Account creation failed');

    }

    public function edit($id){
        return view('dashboard.pages.admin.account_edit',[
            'account' => Account::find($id)
        ]);
    }

    public function update(Request $request, $id){
        //data validation
        $validation = $request->validate([
            'name' => 'required|max:255',
            'classes' => 'required| min:1| array| in:1,2,3,4,5,6,7,8,9,10',
            'total' => 'required| numeric',
        ]);

        //number of key, value pair in array
        $number_of_key_value_pairs = (int)$request->number_of_key_value_pairs;

        //pushing the key value pair into an array
        $key_value_pair = [];
        for($i = 1; $i <= $number_of_key_value_pairs; $i++){
            $key_value_pair[$request->input('key'.$i)] = $request->input('value'.$i);
        }

        //json encode the array
        $validation['expenses'] = json_encode($key_value_pair);

        //json ecnoding the classes array
        $validation['classes'] = json_encode($validation['classes']);

        //update into database
        $update = Account::find($id)->update($validation);

        //if success redirect to account page with success message else redirect back with error message
        return $update ? redirect()->route('admin.account.index')->with('success', 'Account updated successfully') : redirect()->back()->with('error', 'Account updation failed');
    }

    public function updateStatus(Request $request){
        //status to set
        $status = $request->status? 0 : 1;
        //set expire date to 10 days from now using carbon
        $expire_date = Carbon::now()->addDays(10);
        //data array based on status
        $data = $status ? ['status' => $status, 'expire' => $expire_date] : ['status' => $status, 'expire' => null]; 
        //update into database
        $update = Account::find($request->id)->update($data);
        //if success redirect to account page with success message else redirect back with error message
        return $update ? redirect()->route('admin.account.index')->with('success', 'Account status updated successfully') : redirect()->back()->with('error', 'Account status updation failed');
    }
}
