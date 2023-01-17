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
        <x-dashboard.organisms.class-bar />
        <div class="display-grid three-grid min-h-86">
            <x-dashboard.organisms.routine-form-sm />
            <x-dashboard.organisms.routine-table-sm :routines="$routines"/>
        </div> 
    </div>
@endsection
@section('exclusive_scripts')
<script>
    function getData(input) {
        let class_id = document.getElementById('grade').value;
        //get sections
        axios.get(`section/get/${class_id}`)
        .then(function (response) {
            let section_id = document.getElementById('section_id');
            let section_list = document.querySelector('.section-list');

            //remove options from section_id and section_list
            while (section_list.firstChild) {
                section_list.removeChild(section_list.firstChild);
            }
            while (section_id.firstChild) {
                section_id.removeChild(section_id.firstChild);
            }
            section_id.innerHTML = '<option value="" selected disabled>Select a Section</option>'
            response.data.forEach(element => {
                //add section to section_list
                let li = document.createElement('li');
                li.classList.add('bar-item', 'button-30');
                li.setAttribute('onclick', `setSection(${element.id})`);
                li.setAttribute('id', `section-${element.id}`);
                li.innerText = element.name;
                section_list.appendChild(li);
                //add section to section_id
                let option = document.createElement('option');
                option.value = element.id;
                option.innerText = element.name;
                section_id.appendChild(option);
            });
        })
        .catch(function (error) {
            console.log(error);
        });

        //get subjects
        axios.get(`subject/get/${class_id}`)
        .then(function (response) {
            let subject_id = document.getElementById('subject_id');
            //remove options from subject_id
            while (subject_id.firstChild) {
                subject_id.removeChild(subject_id.firstChild);
            }
            subject_id.innerHTML = '<option value="" selected disabled>Select a Subject</option>'
            response.data.forEach(element => {
                let option = document.createElement('option');
                option.value = element.id;
                option.innerText = element.name;
                subject_id.appendChild(option);
            });
        })
    }

    function dataToForm(element){
        const parent = element.parentNode.parentNode
        let name = parent.children[1].innerText;
        let section_class = parent.children[2].innerText;
        let teacher = parent.children[3].innerText;
        let section_id = parent.children[4].value;

        document.getElementById('update_section_name').value = name;
        document.getElementById('update_section_id').value = section_id;
        document.getElementById('update_section_class').value = section_class;

        var update_teacher_options = Array.from(document.getElementById('update_section_teacher').children);
        update_teacher_options.forEach(option => {
            if(option.innerText == teacher){
                option.setAttribute('selected', 'selected');
            }
        });
    }

    function setClass(class_id){
        let class_list = Array.from(document.getElementsByClassName('class-list')[0].children);
        class_list.forEach(element => {
            element.classList.remove('button-30--active');
        });
        document.getElementById(`class-${class_id}`).classList.add('button-30--active');
        document.getElementById('grade').value = class_id;
        getData();

        //if section_id is empty then display alert
        let section_id = document.getElementById('section_id');
        section_id.value = '';
        if(section_id.value == ''){
            let alert = document.getElementById('class-alert');
            alert.classList.remove('d-none');
        }
    }

    function setSection(section_id){
        let section_list = Array.from(document.getElementsByClassName('section-list')[0].children);
        section_list.forEach(element => {
            element.classList.remove('button-30--active');
        });
        document.getElementById(`section-${section_id}`).classList.add('button-30--active');
        document.getElementById('section_id').value = section_id;

        removeAlert('class-alert');
    }

    function removeAlert(class_name){
        let alert = document.getElementById(class_name);
        if(alert){
            alert.classList.add('d-none');
        }
    }

    

</script>
@endsection