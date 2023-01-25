@php
    foreach (array('admin','student','teacher','parent','stuff') as $i_guard) {
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
<title>Admin-Section</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')

    <x-dashboard.organisms.sidebar/>
    <div class="right_content">
        <x-dashboard.organisms.nav :username="$user->name" :logout_route="$logout_route" />
        <x-dashboard.organisms.account-bar />
        <div class="table-card-wrapper">
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
            <x-dashboard.organisms.account-table-sm />
        </div>
    </div>
@endsection
@section('exclusive_scripts')
<script>
</script>
@endsection