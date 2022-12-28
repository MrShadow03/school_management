@props(['teachers'])
<form class="data_form" action="{{ route("admin.routine.store") }}" method="post" onsubmit="submitCreateForm(event, this)">
    @csrf
    <h1 class="form_title">Create a new Section</h1>
    <p class="form_subtitle lan-ban text-alert pt-1" id="class-alert">
        <i class="fa-light fa-triangle-exclamation"></i> উপর থেকে ক্লাস এবং শাখা নির্বাচন করুন</p>
    <div class="input_group d-none">
        <div class="input_field">
            <label for="grade">Class <span class="required">*</span></label>
            <select name="class" id="grade" onchange="getData(this.value)">
                <option value="" selected disabled>Select a Class</option>
                <option value="3" >3rd</option>
                <option value="4" >4th</option>
                <option value="5" >5th</option>
                <option value="6" >6th</option>
                <option value="7" >7th</option>
                <option value="8" >8th</option>
                <option value="9" >9th</option>
                <option value="10" >10th</option>
            </select>
            <p class="input_error d-none" id="class_error"></p>
            @error('class')
                <p class="input_error" id="class_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group d-none">
        <div class="input_field">
            <label for="section_id">Section<span class="required">*</span></label>
            <select name="section_id" id="section_id">
                <option value="" selected disabled>Select a Section..</option>
            </select>
            <p class="input_error d-none" id="section_id_error"></p>
            @error('section_id')
                <p class="input_error" id="section_id_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field pt-2">
            <label for="day">Day <span class="required">*</span></label>
            <select name="day" id="day">
                <option value="" selected disabled>Select a Day..</option>
                <option value="Saturday" @selected(old('day')=='Saturday')>Saturday</option>
                <option value="Sunday" @selected(old('day')=='Sunday')>Sunday</option>
                <option value="Monday" @selected(old('day')=='Monday')>Monday</option>
                <option value="Tuesday" @selected(old('day')=='Tuesday')>Tuesday</option>
                <option value="Wednesday" @selected(old('day')=='Wednesday')>Wednesday</option>
                <option value="Thursday" @selected(old('day')=='Thursday')>Thursday</option>
                <option value="Friday" @selected(old('day')=='Friday')>Friday</option>
            </select>
            <p class="input_error d-none" id="day_error"></p>
            @error('day')
                <p class="input_error" id="day_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="subject_id">Subject<span class="required">*</span></label>
            <select name="subject_id" id="subject_id">
                <option value="" selected disabled>Select a subject..</option>
            </select>
            <p class="input_error d-none" id="subject_id_error"></p>
            @error('subject_id')
                <p class="input_error" id="subject_id_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="start_time">Start Time<span class="required">*</span></label>
            <input type="time" name="start_time" id="start_time" value="{{ old('start_time', '07:00') }}">
            <p class="input_error d-none" id="start_time_error"></p>
            @error('start_time')
                <p class="input_error" id="start_time_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>