@props(['sections'])
<div class="table_box grid-row1" style="padding-inline: 15px;">
    <div class="title">
        <h2 class="text-title pb-2">Sections</h2>
    </div>
    <div class="table-wrapper">
        <div>
            @foreach ($sections as $section)
            <a href="{{ route('admin.routine.index', $section->id) }}" class="w-100 row border-top row-hover p-inline">
                <div class="text-body-column">{{ $section->name }} ({{ $section->class }})</div>
            </a>
            @endforeach
        </div>
    </div>
</div>
  