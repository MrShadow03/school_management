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
        <div>
            <x-dashboard.organisms.result_table :section="$section" :results="$results" :mid_results="$mid_results" :final_results="$final_results" :subjects="$subjects" :class="$class"/>
        </div> 
    </div>
@endsection
@section('exclusive_scripts')
@endsection