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
$logout_route = $guard == 'student'? 'logout' : $guard.'.logout';
@endphp

@section('title')
<title>Select Teacher</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')

    <x-dashboard.organisms.sidebar/>
    <div class="right_content">
        <x-dashboard.organisms.nav :username="$user->name" :logout_route="$logout_route" />
        <div class="display-grid three-grid">
            <x-dashboard.organisms.subject-teacher-form-sm :teachers="$teachers"/>
            <x-dashboard.organisms.subject-teacher-table-sm :items="$subjects"/>
            <x-dashboard.organisms.subject-teacher-form-edit :teachers="$teachers"/>
        </div> 
    </div>
@endsection
@section('exclusive_scripts')
<script>
    function getClass(value) {
        let class_id = document.getElementById('grade').value;
        //get sections
        axios.get(`section/get/${class_id}`)
        .then(function (response) {
            let section_id = document.getElementById('section_id');
            //remove options from section_id
            while (section_id.firstChild) {
                section_id.removeChild(section_id.firstChild);
            }
            section_id.innerHTML = '<option value="" selected disabled>Select a section</option>'
            response.data.forEach(element => {
                let option = document.createElement('option');
                option.value = element.id;
                option.innerText = element.name;
                section_id.appendChild(option);
            });
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    function getSubject(section_id){
        //get subjects
        axios.get(`subject/remaining/${section_id}`)
        .then(function (response) {
            let subject_id = document.getElementById('subject_id');
            //remove options from subject_id
            while (subject_id.firstChild) {
                subject_id.removeChild(subject_id.firstChild);
            }
            subject_id.innerHTML = '<option value="" selected disabled>Select a subject</option>'
            response.data.forEach(element => {
                let option = document.createElement('option');
                option.value = element.id;
                option.innerText = element.name;
                subject_id.appendChild(option);
            });
        })
    }

    function dataToForm(data){
        let id = document.getElementById('update_subject_teacher_id');
        let section_id = document.getElementById('update_section_id');
        let subject_id = document.getElementById('update_subject_id');
        let subject_class = document.getElementById('update_grade');
        let teacher_id = document.getElementById('update_teacher_id');
        
        //set values to id
        id.value = data.id;

        //Re-create options in class
        subject_class.innerHTML = '<option value="3">3rd</option><option value="4">4th</option><option value="5">5th</option><option value="6">6th</option><option value="7">7th</option><option value="8">8th</option><option value="9">9th</option><option value="10">10th</option>';

        //set value to class
        subject_class.value = data.class;

        //remove other options from class except the selected one
        Array.from(subject_class.children).forEach(option => {
            if(option.value != subject_class.value){
                option.remove();
            }
        });

        //set value to teacher
        teacher_id.value = data.teacher[0];

        //get sections
        axios.get(`section/get/${data.class}`)
        .then(function (response) {
            //remove options from section_id
            while (section_id.firstChild) {
                section_id.removeChild(section_id.firstChild);
            }
            //section_id.innerHTML = '<option value="" selected disabled>Select a Section</option>'
            response.data.forEach(element => {
                let option = document.createElement('option');
                option.value = element.id;
                option.innerText = element.name;
                section_id.appendChild(option);
            });
            section_id.value = data.section[0];
        })
        .catch(function (error) {
            console.log(error);
        });

        //get subjects
        axios.get(`subject/get/${data.class}`)
        .then(function (response) {
            //remove options from subject_id
            while (subject_id.firstChild) {
                subject_id.removeChild(subject_id.firstChild);
            }
            //subject_id.innerHTML = '<option value="" selected disabled>Select a Subject</option>'
            response.data.forEach(element => {
                let option = document.createElement('option');
                option.value = element.id;
                option.innerText = element.name;
                subject_id.appendChild(option);
            });
            subject_id.value = data.subject[0];
        })
        .catch(function (error) {
            console.log(error);
        });

    }
</script>
@endsection