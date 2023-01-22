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
            <x-dashboard.organisms.single_promotion-section-table-sm :subjects="$subjects" :year="$year" :type="$type" :current_subject_id="$current_subject_id" :current_section_id="$current_section_id"/>
            <x-dashboard.organisms.result-view-student-table-sm :students="$students" :section="$section" :subject="$subject" :year="$year" :type="$type"/>
        </div>
    </div>

@endsection
@section('exclusive_scripts')
@endsection