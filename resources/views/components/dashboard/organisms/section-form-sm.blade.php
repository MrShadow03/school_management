@props(['teachers'])
<form class="data_form" action="{{ route("admin.section.store") }}" method="post">
    @csrf
    <h1 class="form_title pb-2">Create a new Section</h1>
    <div class="input_group">
        <div class="input_field">
            <label for="grade">Class <span class="required">*</span></label>
            <select name="class" id="grade">
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
            <label for="name">Section name <span class="required">*</span></label>
            <input value="{{old('name')}}" type="text" id="name" name="name">
            @error('name')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="teacher_id">Section Teacher <span class="required">*</span></label>
            <select name="teacher_id" id="teacher_id" onchange="createUsername()">
                <option value="" selected disabled>Select Teacher</option>
                @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
            </select>
            @error('teacher_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>