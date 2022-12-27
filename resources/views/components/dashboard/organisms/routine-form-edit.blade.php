@props(['teachers'])
<form class="data_form" action="{{ route("admin.routine.store") }}" method="post">
    @csrf
    <h1 class="form_title pb-2">Create a new Section</h1>
    <div class="input_group">
        <div class="input_field">
            <label for="grade">Class <span class="required">*</span></label>
            <select name="class" id="grade" onchange="getSection(this.value)">
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
            @error('class')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="section_id">Section<span class="required">*</span></label>
            <select name="section_id" id="section_id">
                <option value="" selected disabled>Select a Section..</option>
            </select>
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="subject_id">Subject<span class="required">*</span></label>
            <select name="subject_id" id="subject_id">
                <option value="" selected disabled>Select a subject..</option>
            </select>
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="day">Subject<span class="required">*</span></label>
            <select name="day" id="day">
                <option value="" selected disabled>Select a Day..</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="start_time">Start Time<span class="required">*</span></label>
            <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}">
            @error('start_time')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="end_time">End Time<span class="required">*</span></label>
            <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}">
            @error('end_time')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>