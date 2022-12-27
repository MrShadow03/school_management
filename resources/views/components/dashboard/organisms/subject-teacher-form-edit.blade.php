@props(['teachers'])
<form class="data_form" action="{{ route("admin.assign-subject-teacher.update") }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="id" id="update_subject_teacher_id" value="{{ old('id') }}">

    <h1 class="form_title pb-2">Update</h1>
    <div class="input_group">
        <div class="input_field">
            <label for="grade">Class <span class="required">*</span></label>
            <select name="class" id="update_grade" onchange="getUpdatedData(this.value)">
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
            <label for="section_id">Section <span class="required">*</span></label>
            <select name="section_id" id="update_section_id">
                <option value="" selected disabled>Select a section</option>
            </select>
            @error('section_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="subject_id">Subject <span class="required">*</span></label>
            <select name="subject_id" id="update_subject_id">
                <option value="" selected disabled>Select a subject</option>
            </select>
            @error('subject_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="teacher_id">Teacher <span class="required">*</span></label>
            <select name="teacher_id" id="update_teacher_id">
                <option value="" selected disabled>Select a teacher</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
            @error('teacher_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-pen-to-square"></i> Update Data</button>
</form>