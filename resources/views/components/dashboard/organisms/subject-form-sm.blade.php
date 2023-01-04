<form class="data_form" action="{{ route("admin.subject.store") }}" method="post">
    @csrf
    <h1 class="form_title pb-2">Create a new Subject</h1>
    <div class="input_group">
        <div class="input_field">
            <label for="grade">Class <span class="required">*</span></label>
            <select name="class" id="grade" required>
                <option value="" selected disabled>...</option>
                <option value="3" >3rd</option>
                <option value="4" >4th</option>
                <option value="5" >5th</option>
                <option value="6" >6th</option>
                <option value="7" >7th</option>
                <option value="8" >8th</option>
                <option value="9" >9th</option>
                <option value="10" >10th</option>
            </select>
            @error('class', 'store')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="name">Subject name <span class="required">*</span></label>
            <input value="{{old('name')}}" type="text" id="name" name="name" required>
            @error('name', 'store')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="total_marks">Total marks <span class="required">*</span></label>
            <input value="{{old('total_marks')}}" type="number" id="total_marks" name="total_marks" required>
            @error('total_marks', 'store')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="input_group">
        <div class="input_field">
            <label for="cq">CQ marks <span class="required">*</span></label>
            <input value="{{old('name')}}" type="number" id="cq" name="cq" required>
            @error('cq', 'store')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
        <div class="input_field">
            <label for="mcq">MCQ marks <span class="required">*</span></label>
            <input value="{{old('mcq')}}" type="number" id="mcq" name="mcq">
            @error('mcq', 'store')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
        <div class="input_field">
            <label for="practical">Practical marks <span class="required">*</span></label>
            <input value="{{old('practical')}}" type="number" id="practical" name="practical">
            @error('practical', 'store')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>