@props(['own_sections', 'other_sections'])
<div class="table_box grid-row1" style="padding-inline: 15px;">
    <div class="table-wrapper">
        <div>
            <h2 class="text-title pb-2">My sections</h2>
            @foreach ($own_sections as $section)
            <a href="{{ route('teacher.attendance.create', $section->id) }}" class="w-100 row border-top row-hover p-inline">
                <div class="text-body-column">{{ $section->name }} ({{ $section->class }})</div>
            </a>
            @endforeach
            
            <h2 class="text-title pt-2 pb-2">Other sections</h2>
            @foreach ($other_sections as $section)
            <a href="{{ route('teacher.attendance.create', $section->section->id) }}" class="w-100 row border-top row-hover p-inline">
                <div class="text-body-column">{{ $section->section->name }} ({{ $section->section->class }})</div>
            </a>
            @endforeach
        </div>
    </div>
</div>
  