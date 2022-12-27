@props(['sections'])
<div class="table_box grid-row1">
    <div class="title">
        <h2 class="text-title pb-2">Sections</h2>
    </div>
    <div class="table-wrapper">
        <div>
            <div class="row p-inline">
                <div class="text-title-column">Name</div>
                <div class="text-title-column">Class</div>
            </div>
            <a href="{{ route('teacher.students',[auth()->user()->id]) }}" class="row border-top row-hover p-inline">
                <div class="text-body-column">All students</div>
            </a>
            @foreach ($sections as $section)
            <a href="{{ route('teacher.students',[auth()->user()->id, $section->id]) }}" class="row border-top row-hover p-inline">
                <div class="text-body-column">{{ $section->name }}</div>
                <div class="text-body-column">{{ $section->class }}</div>
            </a>
            @endforeach
        </div>
    </div>
</div>
  