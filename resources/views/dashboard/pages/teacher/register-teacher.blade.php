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
<title>Admin-Student Register</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')

    <x-dashboard.organisms.sidebar/>

    <div class="right_content">
        <x-dashboard.organisms.nav :username="$user->name" :logout_route="$logout_route" search="1"/>

        <div class="form_div">
            <form class="data_form" action="{{ route("admin.register-teacher.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="form_title">Personal Information</h1>
                <p class="form_subtitle mt-1 mb-2"><i class="fa-regular fa-circle-info"></i> Fill the form according to the NID.</p>
                
                <div class="input_group">
                    <div class="input_field">
                        <label for="nid_number">NID number<span class="required">*</span></label>
                        <input value="{{old('nid_number')}}" type="number" id="nid_number" name="nid_number">
                        @error('nid_number')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                        @if (Session::has('nid_number_error'))
                            <p class="input_error">{{ Session::get('s_error') }}</p>
                        @endif
                    </div>
                    <div class="input_field">
                        <label for="name">Name <span class="required">*</span></label>
                        <input value="{{old('name')}}" type="text" id="name" name="name" onkeyup="createUsername()">
                        @error('name')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="input_group">
                    <div class="input_field">
                        <label for="phone_number">Phone Number <span class="required">*</span></label>
                        <input value="{{old('phone_number')}}" type="text" id="phone_number" name="phone_number" onkeyup="createUsername()">
                        @error('phone_number')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="birth_date">Birth Date <span class="required">*</span></label>
                        <input value="{{old('birth_date')}}" type="date" id="birth_date" name="birth_date">
                        @error('birth_date')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_field">
                        <label for="religion">Religion <span class="required">*</span></label>
                        <select name="religion" id="religion">
                            <option value="" selected disabled>Select religion</option>
                            <option value="Islam" @selected(old('religion') == 'Islam')>Islam</option>
                            <option value="Hinduism" @selected(old('religion') == 'Hinduism')>Hinduism</option>
                            <option value="Christianity" @selected(old('religion') == 'Christianity')>Christianity</option>
                            <option value="Buddhism" @selected(old('religion') == 'Buddhism')>Buddhism</option>
                            <option value="Others" @selected(old('religion') == 'Others')>Others</option>
                        </select>
                        @error('religion')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="gender">Gender <span class="required">*</span></label>
                        <select name="gender" id="gender">
                            <option value="" selected disabled>Select gender</option>
                            <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                            <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                            <option value="Others" @selected(old('gender') == 'Others')>Others</option>
                        </select>
                        @error('gender')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="blood_group">Blood Group</label>
                        <select name="blood_group" id="blood_group">
                            <option value="" selected disabled>Select blood group</option>
                            <option value="A+" @selected(old('blood_group') == 'A+')>A+</option>
                            <option value="A-" @selected(old('blood_group') == 'A-')>A-</option>
                            <option value="B+" @selected(old('blood_group') == 'B+')>B+</option>
                            <option value="B-" @selected(old('blood_group') == 'B-')>B-</option>
                            <option value="O+" @selected(old('blood_group') == 'O+')>O+</option>
                            <option value="O-" @selected(old('blood_group') == 'O-')>O+</option>
                            <option value="AB+" @selected(old('blood_group') == 'AB+')>AB+</option>
                            <option value="AB-" @selected(old('blood_group') == 'AB-')>AB+</option>
                        </select>
                        @error('blood_group')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_field">
                        <label for="present_address">Present address <span class="required">*</span></label>
                        <input value="{{old('present_address')}}" type="text" id="present_address" name="present_address">
                        @error('present_address')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field ">
                        <label for="permanent_address">Permanent address <span class="required">*</span> (<a class="text-label text_btn" href="#" onclick="sameAsPresent(this)">Same as Present?</a>) </label>
                        <input value="{{old('permanent_address')}}" type="text" id="permanent_address" name="permanent_address">
                        @error('permanent_address')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_field file_field mb-2">
                        <label class="file_label" for="student_image">
                            <img src="#" alt="img" class="uploaded_img">
                            <i class="icon_lg icon_hover fa-duotone fa-cloud-arrow-up"></i>
                            <i class="icon_lg fa-duotone fa-image"></i>
                            <br>
                            <span> Upload Image</span>
                        </label>
                        <input class="file_input" value="{{old('student_image')}}" type="file" id="student_image" name="teacher_image" onchange="imageUpload(this,event)">
                        @error('student_image')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
  
                <h1 class="form_title pt-2">Academic Information</h1>
                <p class="form_subtitle mt-1 mb-2"><i class="fa-regular fa-circle-info"></i> These informations should be filled according to the respective certificate.</p>
                
                <div class="input_group">
                    <div class="input_field">
                        <label for="group">Group </label>
                        <select name="major" id="group" onchange="selectGroup(this)">
                            <option value="arts">Arts</option>
                            <option value="commerce">Commerce</option>
                            <option value="science">Science</option>
                        </select>
                        @error('group')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="education">Highest Education Lavel </label>
                        <select name="education" id="education">
                            <option value="H.S.C" >H.S.C</option>
                            <option value="BA" >BA</option>
                            <option value="MA" selected>MA</option>
                        </select>
                        @error('education')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
            </form>
        </div>
    </div>
@endsection
@section('exclusive_scripts')

<script>
    let name = document.getElementById('name');
    let username = document.getElementById('username');
    let grade = document.getElementById('grade');
    let class_roll = document.getElementById('class_roll');
    let present_address = document.getElementById('present_address');
    let permanent_address = document.getElementById('permanent_address');

    function createUsername(){
        let text = name.value;
        text = text.toLowerCase().replace(/ /g, '_').replace(/[^\w-]+/g, '');
        username.value = text;
        return username.value;
    }

    function sameAsPresent(){
        permanent_address.value = present_address.value;
    }

    function setGuardian(name){
        local_guardian_name.value = name == 'father' ? father_name.value : mother_name.value;
        local_guardian_contact.value = name == 'father' ? father_contact.value : mother_contact.value;
    }

    function selectGroup(element) {
        let education = document.getElementById('education');
        console.log(element.children);
        while (education.hasChildNodes()) {
            education.removeChild(education.firstChild);
        }
        if(element.value == 'arts'){
            education.innerHTML = `
                <option value="H.S.C" >H.S.C</option>
                <option value="BA" >BA</option>
                <option value="MA" selected>MA</option>
            `;
        }else if(element.value == 'commerce'){
            education.innerHTML = `
                <option value="H.S.C" >H.S.C</option>
                <option value="BBA" >BBA</option>
                <option value="MBA" selected>MBA</option>
            `;
        }else if(element.value == 'science'){
            education.innerHTML = `
                <option value="H.S.C" >H.S.C</option>
                <option value="B.Sc" >B.Sc</option>
                <option value="M.Sc" selected>M.Sc</option>
            `;
        }
    }

    createUsername();
    readURL(document.getElementById('student_image'));
    selectGroup(document.getElementById('group'));

</script>

@endsection