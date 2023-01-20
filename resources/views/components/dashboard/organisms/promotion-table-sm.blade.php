@props(['routines','sections','students'])
<div class="table_box table-thin">
    <h1 class="text-title mb-1">Promote Student</h1>
    <form action="{{ route("admin.routine.store") }}" method="post" onsubmit="submitCreateForm(event, this)" class="filter-form pb-2">
        @csrf
        <div class="input_group">
            <div class="input_field">
                <label for="section_id">From <span class="required">*</span></label>
                <select name="current_section" id="current_section_id" onchange="getAvailableSections(this.value)">
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
                <select name="Promoted_section" id="promoted_section_id">
                </select>
                @error('section_id')
                    <p class="input_error" id="class_error">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn mt-1" style="padding-block: 11px; margin-top: 26px;"><i class="fa-regular fa-arrow-up-wide-short"></i> Promote</button>
        </div>
    </form>
    <div class="table-wrapper border-top d-none" id="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Merit Position</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Total Marks</th>
                    <th class="heading-column text-title-column">Grade</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <tr class="body-row">
                </tr>
            </tbody>
        </table>
        <p class="form_subtitle text-alert pt-1"><i class="fa-solid fa-info-circle"></i> Failed Students Will not be promoted automatically.</p>
    </div>
</div>