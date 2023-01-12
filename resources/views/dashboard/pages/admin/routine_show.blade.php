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
        <div class="@if($guard=='admin') display-grid three-grid grid-column-20 @endif">
            @if (Auth::guard('admin')->check())
            <x-dashboard.organisms.routine-section-table-sm :sections="$all_sections"/>
            @endif
            <x-dashboard.organisms.routine-view-table-sm :routine="$routine" :times="$times"/>
        </div> 
    </div>
@endsection
@section('exclusive_scripts')
@endsection