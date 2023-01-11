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
$logout_route = $guard == 'student'? 'logout' : $guard.'.logout';
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
        <x-dashboard.organisms.grade-table-sm :grades="$grades"/>
    </div>

@endsection
@section('exclusive_scripts')
<script>
    function placeData(parent){
        let tr = parent.parentNode;
        let name = tr.children[0].innerText;
        let score = tr.children[1].innerText;
        let comment = tr.children[2].innerText;

        let name_input = document.getElementById('name');
        let score_input = document.getElementById('score');
        let comment_input = document.getElementById('comment');

        name_input.value = name;
        score_input.value = score;
        comment_input.value = comment;

    }
</script>
@endsection