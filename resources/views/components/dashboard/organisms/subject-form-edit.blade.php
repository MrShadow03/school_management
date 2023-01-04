<form class="data_form" action="{{ route("admin.subject.update") }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="id" id="update_subject_id" value="{{ old('id') }}">
    <h1 class="form_title pb-2">Update Subject</h1>
    <div class="input_group">
        <div class="input_field">
            <label for="grade">Class <span class="required">*</span></label>
            <select name="class" id="update_subject_class">
                <option value="" selected disabled>...</option>
                <option value="3" @selected(old('class')=="3") >3rd</option>
                <option value="4" @selected(old('class')=="4") >4th</option>
                <option value="5" @selected(old('class')=="5") >5th</option>
                <option value="6" @selected(old('class')=="6") >6th</option>
                <option value="7" @selected(old('class')=="7") >7th</option>
                <option value="8" @selected(old('class')=="8") >8th</option>
                <option value="9" @selected(old('class')=="9") >9th</option>
                <option value="10" @selected(old('class')=="10") >10th</option>
            </select>
            @error('class', 'update')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="name">Subject <span class="required">*</span></label>
            <input type="text" name="name" id="update_subject_name">
            @error('class', 'update')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="total_marks">Total marks <span class="required">*</span></label>
            <input value="{{old('total_marks')}}" type="number" id="update_total_marks" name="total_marks" required>
            @error('total_marks', 'update')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="cq">CQ marks <span class="required">*</span></label>
            <input value="{{old('name')}}" type="number" id="update_cq" name="cq" required>
            @error('cq', 'update')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
        <div class="input_field">
            <label for="mcq">MCQ marks <span class="required">*</span></label>
            <input value="{{old('mcq')}}" type="number" id="update_mcq" name="mcq">
            @error('mcq', 'update')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
        <div class="input_field">
            <label for="practical">Practical marks <span class="required">*</span></label>
            <input value="{{old('practical')}}" type="number" id="update_practical" name="practical">
            @error('practical', 'update')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>