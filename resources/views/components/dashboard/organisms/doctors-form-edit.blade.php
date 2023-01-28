@props(['doctors','sections'])
<form class="data_form" action="{{ route("admin.assistants.update") }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="section_id" id="update_section_id" value="{{ old('section_id') }}">

    <h1 class="form_title pb-2">Update Section</h1>
    <div class="input_group">
        <div class="input_field">
            <label for="name">Section <span class="required">*</span></label>
            <input type="text" name="name" id="update_section_name">
            @error('class')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="grade">Class <span class="required">*</span></label>
            <select name="class" id="update_section_class">
                <option value="" selected disabled>Select a Class</option>
                <option value="3" @selected(old('class')=="3") >3rd</option>
                <option value="4" @selected(old('class')=="4") >4th</option>
                <option value="5" @selected(old('class')=="5") >5th</option>
                <option value="6" @selected(old('class')=="6") >6th</option>
                <option value="7" @selected(old('class')=="7") >7th</option>
                <option value="8" @selected(old('class')=="8") >8th</option>
                <option value="9" @selected(old('class')=="9") >9th</option>
                <option value="10" @selected(old('class')=="10") >10th</option>
            </select>
            @error('class')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="doctor_id">Section doctor <span class="required">*</span></label>
            <select name="doctor_id" id="update_section_doctor">
                <option value="" selected disabled>Select doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{$doctor->id}}" @selected(old('doctor_id') == $doctor->id )>{{$doctor->name}}</option>
                @endforeach
            </select>
            @error('doctor_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>