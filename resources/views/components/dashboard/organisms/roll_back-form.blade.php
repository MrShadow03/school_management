@props(['routines','sections','students'])
<div class="table_box table-thin">
    <h1 class="text-title mb-1">Promote Student</h1>
    <form action="{{ route("admin.promotion.update") }}" method="post" onsubmit="submitCreateForm(event, this)" class="filter-form pb-2">
        @csrf
        @method('PATCH')
        <div class="input_group">
            <div class="input_field">
                <label for="section_id">From <span class="required">*</span></label>
                <select name="current_section" id="current_section_id" onchange="getAvailableSections(this.value)" required>
                    <option value="" selected disabled>Select Section</option>
                    @foreach ($sections->unique('class')->pluck('class') as $class)
                        <optgroup label="Class: {{ $class }}">
                            @foreach ($sections->where('class', $class) as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('section_id')
                    <p class="input_error" id="class_error">{{$message}}</p>
                @enderror
            </div>
            <div class="input_field">
                <label for="section_id">To <span class="required">*</span></label>
                <select name="promotion_section" id="promoted_section_id" required>
                </select>
                @error('section_id')
                    <p class="input_error" id="class_error">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" onclick="this.form.submit()" class="btn mt-1" style="padding-block: 11px; margin-top: 26px;"><i class="fa-regular fa-arrow-up-wide-short"></i> Promote</button>
        </div>
    </form>
</div>