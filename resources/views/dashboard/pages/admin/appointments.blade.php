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
            <x-dashboard.organisms.appointments-form-sm :doctors="$doctors" />
            <x-dashboard.organisms.appointments-table-sm :appointments="$appointments" :doctors="$doctors" />
            {{-- <x-dashboard.organisms.appointments-form-edit :doctors="$doctors" /> --}}
        </div> 
    </div>
@endsection
@section('exclusive_scripts')
<script>
    function getSerialNumber(doctor_id) {
        console.log(doctor_id);
        axios.get(`/admin/appointments/getSerialNumber/${doctor_id}`)
        .then(function (response) {
            document.getElementById('serial_number').value = response.data.serial_number;

        })
        .catch(function (error) {
            console.log(error);
        });
    }

    // function dataToForm(element){
    //     const parent = element.parentNode.parentNode
    //     let name = parent.children[1].innerText;
    //     let section_class = parent.children[2].innerText;
    //     let teacher = parent.children[3].innerText;
    //     let section_id = parent.children[4].value;

    //     document.getElementById('update_section_id').value = section_id;
    //     document.getElementById('update_section_class').value = section_class;

    //     var update_teacher_options = Array.from(document.getElementById('update_section_teacher').children);
    //     update_teacher_options.forEach(option => {
    //         if(option.innerText == teacher){
    //             option.setAttribute('selected', 'selected');
    //         }
    //     });
    // }

    //Tom selects
    // new TomSelect("#doctor_id",{
    //     create: false,
    //     sortField: {
    //         field: "text",
    //         direction: "asc"
    //     }
    // });
</script>
@endsection