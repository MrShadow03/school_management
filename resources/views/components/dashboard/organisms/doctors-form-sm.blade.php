@props(['doctors', 'departments', 'assistants'])
<form class="data_form" action="{{ route("admin.doctors.store") }}" method="post">
    @csrf
    <h1 class="form_title pb-2">Register a Doctor</h1>
    <div class="input_group">
        <div class="input_field">
            <label for="name">Name <span class="required">*</span></label>
            <input value="{{old('name')}}" type="text" id="name" name="name" required>
            @error('name')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="department_id">department <span class="required">*</span></label>
            <select name="department_id" id="department_id" required>
                <option value="" disabled selected>Select a department</option>
                @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>
            @error('department_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="specialty">Specialty <span class="required">*</span></label>
            <input value="{{old('specialty')}}" type="text" id="specialty" name="specialty">
            @error('specialty')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="contact_number">Contact number <span class="required">*</span></label>
            <input value="{{old('contact_number')}}" type="number" id="contact_number" name="contact_number">
            @error('contact_number')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="visit_time">Visit Time <span class="required">*</span></label>
            <input value="{{old('visit_time')}}" type="text" id="visit_time" name="visit_time" placeholder="5pm" required>
            @error('visit_time')
            <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="designation">Designation <span class="required">*</span></label>
            <input value="{{old('designation')}}" type="text" id="designation" name="designation">
            @error('designation')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="student_id">Assistant <span class="required">*</span></label>
            <select name="student_id" id="student_id">
                <option value="" disabled selected>Select an assistant</option>
                @foreach ($assistants as $assistant)
                    <option value="{{$assistant->id}}">{{$assistant->name}}</option>
                @endforeach
            </select>
            @error('student_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>