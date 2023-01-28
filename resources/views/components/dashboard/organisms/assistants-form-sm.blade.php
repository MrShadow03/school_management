@props(['doctors'])
<form class="data_form" action="{{ route("admin.assistants.store") }}" method="post">
    @csrf
    <h1 class="form_title pb-2">Create an Assistant</h1>
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
            <label for="contact_number">Contact number <span class="required">*</span></label>
            <input value="{{old('contact_number')}}" type="number" id="contact_number" name="contact_number" required>
            @error('contact_number')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="doctor_id">Doctor <span class="required">*</span></label>
            <select name="doctor_id" id="doctor_id" required>
                <option value="" disabled selected>Select a doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                @endforeach
            </select>
            @error('doctor_id')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>