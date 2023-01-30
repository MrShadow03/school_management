<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.dashboard',[
            'appointments' => Appointment::with('doctor')->whereDate('created_at', date('Y-m-d'))->orderBy('doctor_id')->get(),
            'doctors' => Doctor::all(),
        ]);
    }
    
    public function create()
    {
        return view('dashboard.pages.admin.appointments',[
            'appointments' => Appointment::with('doctor')->whereDate('created_at', date('Y-m-d'))->orderBy('doctor_id')->get(),
            'doctors' => Doctor::where('status', 1)->get(),
        ]);
    }
    
    public function filter(Request $request)
    {
        if($request->doctor_id == 0){
            $appointments = Appointment::with('doctor')->whereDate('created_at', date('Y-m-d'))->orderBy('doctor_id')->get();
        }else{
            $appointments = Appointment::with('doctor')->where('doctor_id', $request->doctor_id)->whereDate('created_at', date('Y-m-d'))->orderBy('doctor_id')->get();
        }
        return view('dashboard.pages.dashboard',[
            'appointments' => $appointments,
            'doctors' => Doctor::all(),
            'doctor' => Doctor::find($request->doctor_id)->name,
            
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            "name" => "required",
            "doctor_id" => "required",
            "contact_number" => "required| numeric| digits: 11",
            "serial_number" => "required",
        ]);

        $appointment = Appointment::create([
            "name" => $request->name,
            "doctor_id" => $request->doctor_id,
            "contact_number" => $request->contact_number,
            "serial_number" => $request->serial_number,
        ]);

        $visit_time = Doctor::find($request->doctor_id)->visit_time;
        $room_number = Doctor::find($request->doctor_id)->room_number;
        $doctor = Doctor::find($request->doctor_id)->name;

        // if($appointment){
        //     $post_url = "https://api.smsinbd.com/sms-api/sendsms" ;
        //     $response = [];
        //     $sms_body = 'Appointment for '.$request->name.' is confirmed. Doctor: '.$doctor.'. Serial Number: '.$request->serial_number.'. Time: '.$visit_time.'. Room number: '.$room_number.'. -South Apollo Hospital, Barisal';
        //     $sms = $sms_body;
        //     $post_values = array(
        //         'api_token' => '1BMvjpBSyia5PjdZi5juxtWANZRqmkuYfbJ42EO8',
        //         'senderid' => '8809612442451',
        //         'message' => $sms,
        //         'contact_number' => '88'.$request->contact_number,
        //     );
        //     $post_string = "";
        //     foreach( $post_values as $key => $value )
        //     { $post_string .= "$key=" . urlencode( $value ) . "&"; }
        //     $post_string = rtrim( $post_string, "& " );
            
        //     $request = curl_init($post_url);
        //     curl_setopt($request, CURLOPT_HEADER, 0);
        //     curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);  
        //     curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); 
        //     curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);  
        //     $post_response = curl_exec($request);
        //     curl_close ($request);
        //     $array =  json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $post_response), true );
        // }

        return redirect()->route('admin.appointments.create')->with('success', 'Department created successfully');
    }

    public function getSerialNumber(Request $request)
    {
        //find the appointments of today, where doctor_id is equal to the doctor_id of the request
        $appointments = Appointment::where('doctor_id', $request->doctor_id)->whereDate('created_at', date('Y-m-d'))->get();
        
        //max serial number of the appointments of today
        $max_serial_number = $appointments->max('serial_number');

        //if there is no appointment of today, then serial number will be 1
        if($max_serial_number == null){
            $max_serial_number = 1;
        }else{
            //if there is an appointment of today, then serial number will be max_serial_number + 1
            $max_serial_number = $max_serial_number + 1;
        }

        return response()->json([
            'serial_number' => $max_serial_number,
        ]);
    }
}
