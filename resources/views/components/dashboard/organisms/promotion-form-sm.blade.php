@props(['sections'])
<form class="data_form" action="{{ route("admin.routine.store") }}" method="post" onsubmit="submitCreateForm(event, this)">
    @csrf
    <h1 class="form_title">Create a new Section</h1>
    <div class="input_group d-none">
        <div class="input_field">
            <label for="section_id">Class <span class="required">*</span></label>
            <select name="class" id="section_id" onchange="getData(this.value)">
                
            </select>
            <p class="input_error d-none" id="class_error"></p>
            @error('section_id')
                <p class="input_error" id="class_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>