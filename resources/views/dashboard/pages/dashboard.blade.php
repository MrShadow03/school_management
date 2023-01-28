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
        <div class="admin-dashboard-grid">
            <div class="grid-item">
                <div class="grid__wrapper card">
                    <div class="card__icon__wrapper bg-success-light"><i class="card__icon fa-solid fa-dollar-sign text-success"></i></div>
                    <div class="card__details">
                        <h6 class="card__title">Total Students</h6>
                        <h6 class="card__data">9526</h6>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper card">
                    <div class="card__icon__wrapper bg-info-light"><i class="card__icon fa-solid fa-bangladeshi-taka-sign text-info"></i></div>
                    <div class="card__details">
                        <h6 class="card__title">Total Students</h6>
                        <h6 class="card__data">9526</h6>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper card">
                    <div class="card__icon__wrapper bg-warning-light"><i class="card__icon fa-solid fa-donate text-warning"></i></div>
                    <div class="card__details">
                        <h6 class="card__title">Total Students</h6>
                        <h6 class="card__data">9526</h6>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper card">
                    <div class="card__icon__wrapper bg-danger-light"><i class="card__icon fa-solid fa-money-bill text-danger"></i></div>
                    <div class="card__details">
                        <h6 class="card__title">Total Students</h6>
                        <h6 class="card__data">9526</h6>
                    </div>
                </div>
            </div>
            
            <div class="grid-item">
                <div class="grid__wrapper">
                    <div class="grid__title">
                        <p>Total Students</p>
                    </div>
                    <canvas id="admin-bar-chart"></canvas>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper">
                    <div class="grid__title">
                        <p>Total Students</p>
                    </div>
                    <canvas id="admin-bar-chart"></canvas>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper">
                    <div class="grid__title">
                        <p>Total Students</p>
                    </div>
                    <canvas id="admin-bar-chart"></canvas>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper">
                    <div class="grid__title">
                        <p>Total Students</p>
                    </div>
                    <canvas id="admin-bar-chart"></canvas>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper">
                    <div class="grid__title">
                        <p>Total Students</p>
                    </div>
                    <canvas id="admin-bar-chart"></canvas>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper">
                    <div class="grid__title">
                        <p>Total Students</p>
                    </div>
                    <canvas id="admin-bar-chart"></canvas>
                </div>
            </div>
            <div class="grid-item">
                <div class="grid__wrapper">
                    <div class="grid__title">
                        <p>Total Students</p>
                    </div>
                    <canvas id="admin-bar-chart"></canvas>
                </div>
            </div>

        </div>
        @endif
    </div>
@endsection