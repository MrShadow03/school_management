@php
    foreach (array('admin','student','teacher','parent','stuff') as $i_guard) {
        if(Auth::guard($i_guard)->check()){
            $guard = $i_guard;
            break;
        }else{
            $guard = '';
        }
    }
$user = Auth::guard($guard)->user() ?? 'invalid user';
$logout_route = $guard.'.logout';
@endphp

@section('title')
<title>Teacher-Students</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')
    <x-dashboard.organisms.sidebar/>
    <div class="right_content">
        <x-dashboard.organisms.nav :username="$user->name" :logout_route="$logout_route" />
        <div class="display-grid three-grid grid-column-20">
            <x-dashboard.organisms.attendance-section-table-sm :own_sections="$own_sections" :other_sections="$other_sections"/>
            <x-dashboard.organisms.attendance-student-table-sm :students="$students" :section_name="$section_name"/>
        </div>
    </div>

@endsection
@section('exclusive_scripts')
<script>
    function setAttendanceValue(event, value, student_id){
        document.getElementById('attendance_input_'+student_id).value = value;
    }

    function setCanceledAttendanceValue(event, student_id){
        document.getElementById('cancel_attendance_'+student_id).value = value;
    }
</script>
@endsection