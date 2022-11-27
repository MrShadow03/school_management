@extends('dashboard.app')
@section('exclusive_styles')
    <style>
        body {
            background-color: red;
        }
    </style>
@endsection
@section('main')
    <x-dashboard.organisms.sidebar/>
    <div class="right_content">
        <x-dashboard.organisms.nav/>
        <x-dashboard.organisms.card/>
        <div class="teacher_content">
            <x-dashboard.organisms.pie-chart/>
            <x-dashboard.organisms.table-sm/>
        </div>  
    </div>
@endsection