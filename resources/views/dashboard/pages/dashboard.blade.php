@php
    foreach (array('admin','student') as $i_guard) {
        if(Auth::guard($i_guard)->check()){
            $guard = $i_guard;
            break;
        }else{
            $guard = '';
        }
    }
//
$user = Auth::guard($guard)->user() ?? 'invalid user';
$logout_route = $guard.'.logout';
@endphp
@section('title')
<title>Dashboard</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')

    <x-dashboard.organisms.sidebar/>

    <div class="right_content">
        <x-dashboard.organisms.nav :username="$user->name" :logout_route="$logout_route" />        
        @if (Auth::guard('admin')->check())
        <div class="bar-wrapper">
            <ul class="class-list bar">
                <li class="bar-item button-31" id="class-3" ><a href="{{ route('admin.appointments.create') }}"><i class='fa-regular fa-plus'></i> Create a new appointment</a></li>
            </ul>
        </div>

        <x-dashboard.organisms.appointments-table-sm :appointments="$appointments" :doctors="$doctors"/>
        @endif
    </div>
@endsection