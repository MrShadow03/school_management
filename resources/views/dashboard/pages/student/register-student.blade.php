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
            <form class="data_form" action="{{ route("admin.register-student.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="form_title">Which class are you registering for?</h1>
                <div class="input_group">
                    <div class="input_field">
                        <div class="input_field pb-2">
                            <label for="grade">Class <span class="required">*</span></label>
                            <select name="class" id="grade" onchange="createUsername();getSections(this.value);">
                                <option value="" selected disabled>Select a Grade</option>
                                <option value="3" >3rd</option>
                                <option value="4" >4th</option>
                                <option value="5" >5th</option>
                                <option value="6" >6th</option>
                                <option value="7" >7th</option>
                                <option value="8" >8th</option>
                                <option value="9" >9th</option>
                                <option value="10" >10th</option>
                            </select>
                            @error('class')
                                <p class="input_error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <h1 class="form_title pt-2">Personal Information</h1>
                <p class="form_subtitle mt-1 mb-2"><i class="fa-regular fa-circle-info"></i> Fill the form according to the birth cirtificate.</p>
                <div class="input_group">
                    <div class="input_field">
                        <label for="name">Student Name <span class="required">*</span></label>
                        <input value="{{old('name')}}" type="text" id="name" name="name" onkeyup="createUsername()">
                        @error('name')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_field">
                        <label for="birth_certificate_number">Birth certificate number<span class="required">*</span></label>
                        <input value="{{old('birth_certificate_number')}}" type="number" id="birth_certificate_number" name="birth_certificate_number">
                        @error('birth_certificate_number')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                        @if (Session::has('birth_certificate_number_error'))
                            <p class="input_error">{{ Session::get('s_error') }}</p>
                        @endif
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
                            <span> Upload<br>student image</span>
                        </label>
                        <input class="file_input" value="{{old('student_image')}}" type="file" id="student_image" name="student_image" onchange="imageUpload(this,event)">
                        @error('student_image')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <h1 class="form_title pt-2">Guardians' Information</h1>
                <p class="form_subtitle mt-1 mb-2"><i class="fa-regular fa-circle-info"></i> Fill the form according to the parents <i>National Identity Card (NID)</i>.</p>

                <div class="input_group">
                    <div class="input_field">
                        <label for="father_name">Father's Name</label>
                        <input value="{{old('father_name')}}" type="text" id="father_name" name="father_name">
                        @error('father_name')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="father_contact">Father's Contact Number</label>
                        <input value="{{old('father_contact')}}" type="text" id="father_contact" name="father_contact" >
                        @error('father_contact')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                        @if (Session::has('f_error'))
                            <p class="input_error">{{ Session::get('f_error') }}</p>
                        @endif
                    </div>
                    <div class="input_field">
                        <label for="father_nid">Father's NID number</label>
                        <input value="{{old('father_nid')}}" type="number" id="father_nid" name="father_nid">
                        @error('father_nid')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_field">
                        <label for="mother_name">Mother's Name</label>
                        <input value="{{old('mother_name')}}" type="text" id="mother_name" name="mother_name">
                        @error('mother_name')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="mother_contact">Mother's Contact Number</label>
                        <input value="{{old('mother_contact')}}" type="text" id="mother_contact" name="mother_contact">
                        @error('mother_contact')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                        @if (Session::has('m_error'))
                            <p class="input_error">{{ Session::get('m_error') }}</p>
                        @endif
                    </div>
                    <div class="input_field">
                        <label for="mother_nid">Mother's NID number</label>
                        <input value="{{old('mother_nid')}}" type="number" id="mother_nid" name="mother_nid">
                        @error('mother_nid')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_field">
                        <label for="local_guardian_name">Local guardians Name (<a class="text-label text_btn" href="#" onclick="setGuardian('father')">Father</a> or <a class="text-label text_btn" href="#" onclick="setGuardian('mother')">Mother</a> ?)</label>
                        <input value="{{old('local_guardian_name')}}" type="text" id="local_guardian_name" name="local_guardian_name">
                        @error('local_guardian_name')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="local_guardian_contact">Local guardians Number</label>
                        <input value="{{old('local_guardian_contact')}}" type="text" id="local_guardian_contact" name="local_guardian_contact">
                        @error('local_guardian_contact')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                        @if (Session::has('m_error'))
                            <p class="input_error">{{ Session::get('m_error') }}</p>
                        @endif
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_field file_field">
                        <label class="file_label" for="father_image">
                            <img src="#" alt="img" class="uploaded_img">
                            <i class="icon_lg icon_hover fa-duotone fa-cloud-arrow-up"></i>
                            <i class="icon_lg fa-duotone fa-image"></i>
                            <br>
                            <span> Upload<br>Father's image</span>
                        </label>
                        <input class="file_input" value="{{old('father_image')}}" type="file" id="father_image" name="father_image" onchange="imageUpload(this,event)">
                        @error('father_image')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div> 
                    <div class="input_field file_field mb-2">
                        <label class="file_label" for="mother_image">
                            <img src="#" alt="img" class="uploaded_img">
                            <i class="icon_lg icon_hover fa-duotone fa-cloud-arrow-up"></i>
                            <i class="icon_lg fa-duotone fa-image"></i>
                            <br>
                            <span> Upload<br>Mother's image</span>
                        </label>
                        <input class="file_input" value="{{old('mother_image')}}" type="file" id="mother_image" name="mother_image" onchange="imageUpload(this,event)">
                        @error('mother_image')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                
                <h1 class="form_title pt-2">Academic Information</h1>
                <p class="form_subtitle mt-1 mb-2"><i class="fa-regular fa-circle-info"></i> These informations should be provided by the school.</p>
                
                <div class="input_group">
                    <div class="input_field">
                        <label for="section">Section </label>
                        <select name="section_id" id="section">
                            <option value="" selected disabled>Select a Section</option>
                        </select>
                        @error('section')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input_field">
                        <label for="class_roll">Class Roll</label>
                        <input value="{{old('class_roll')}}" type="number" id="class_roll" name="class_roll" onkeyup="createUsername()">
                        @error('class_roll')
                            <p class="input_error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="input_group">
                    <div class="input_field">
                        <label for="username">Username <span class="required">*</span></label>
                        <input value="{{old('username')}}" type="text" id="username" name="username">
                        @error('username')
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
    let local_guardian_name = document.getElementById('local_guardian_name');
    let local_guardian_contact = document.getElementById('local_guardian_contact');('permanent_address');
    let father_name = document.getElementById('father_name');
    let mother_name = document.getElementById('mother_name');
    let father_contact = document.getElementById('father_contact');
    let mother_contact = document.getElementById('mother_contact');

    function createUsername(){
        let text = name.value;
        text = text.toLowerCase().replace(/ /g, '_').replace(/[^\w-]+/g, '');
        username.value = text+grade.value+class_roll.value;
        return username.value;
    }

    function sameAsPresent(){
        permanent_address.value = present_address.value;
    }

    function setGuardian(name){
        local_guardian_name.value = name == 'father' ? father_name.value : mother_name.value;
        local_guardian_contact.value = name == 'father' ? father_contact.value : mother_contact.value;
    }

    function getSections(class_id){
        let section = document.getElementById('section');
        var url = "{{ route('admin.section.getSections', ':id') }}";
        url = url.replace(':id', class_id);
        axios.get(url)
        .then(function (response) {
            let datas = response.data;
            while(section.firstChild){
                section.removeChild(section.firstChild);
            };
            section.innerHTML = '<option value="" selected disabled>Select a Section</option>';
            datas.forEach(data => {
                let option = document.createElement('option');
                option.value = data.id;
                option.innerHTML = data.name;
                section.appendChild(option);
            });
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    createUsername();

</script>

@endsection