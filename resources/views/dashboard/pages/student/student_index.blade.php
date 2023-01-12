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
<title>Admin-Section</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')

    <x-dashboard.organisms.sidebar/>
    <div class="right_content">
        <x-dashboard.organisms.nav :username="$user->name" :logout_route="$logout_route" />
        <div>
            <div class="table_box">
                <div class="title">
                    <h2 class="text-title pb-2">Students</h2>
                </div>
                <div class="table-wrapper">
                    <table class="w-100">
                        <thead>
                            <tr class="heading-row">
                                <th class="heading-column text-title-column">Id</th>
                                <th class="heading-column text-title-column">Name</th>
                                <th class="heading-column text-title-column">Class</th>
                            </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        <tbody>
                            @foreach ($students as $student)
                            <tr class="body-row">
                                <td class="body-column text-body-column">{{ $i }}</td>
                                <td class="body-column text-body-column">{{ $student->name }}</td>
                                <td class="body-column text-body-column">{{ $student->class }}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
@endsection