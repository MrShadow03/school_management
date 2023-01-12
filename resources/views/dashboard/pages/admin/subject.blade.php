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
        <div class="display-grid three-grid">
            <x-dashboard.organisms.subject-form-sm/>
            <x-dashboard.organisms.subject-table-sm :subjects="$subjects"/>
            <x-dashboard.organisms.subject-form-edit/>
        </div> 
    </div>
@endsection
@section('exclusive_scripts')
<script>
    function getData(input) {
        let section_name = input.value;
        axios.get(`/admin/section/axios/${section_name}`)
        .then(function (response) {
            data = response.data;
            name.value = data.name; 

        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function dataToForm(element){
        const parent = element.parentNode.parentNode
        let id = parent.children[0].innerText;
        let name = parent.children[1].innerText;
        let subject_class = parent.children[2].innerText;
        let total_marks = parent.children[3].innerText;
        let cq = parent.children[4].innerText;
        let mcq = parent.children[5].innerText;
        let practical = parent.children[6].innerText;

        document.getElementById('update_subject_name').value = name;
        document.getElementById('update_subject_id').value = id;
        document.getElementById('update_subject_class').value = subject_class;
        document.getElementById('update_total_marks').value = total_marks;
        document.getElementById('update_cq').value = cq;
        document.getElementById('update_mcq').value = mcq;
        document.getElementById('update_practical').value = practical;
    }
</script>
@endsection