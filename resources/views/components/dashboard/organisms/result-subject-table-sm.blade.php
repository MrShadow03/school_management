@props(['subjects', 'year', 'type'])
<div class="table_box grid-row1" style="padding-inline: 15px;">
    <div class="table-wrapper">
        <div>            
            <h2 class="text-title pt-2 pb-2">My Subjects</h2>
            @foreach ($subjects as $subject)
            <a href="{{ route('teacher.result_upload.create',[$year,$type,$subject->section->id,$subject->subject->id]) }}" class="w-100 row border-top row-hover p-inline">
                <div class="text-body-column">{{ $subject->subject->name }} - {{ $subject->section->name }}({{ $subject->section->class }})</div>
            </a>
            @endforeach
        </div>
    </div>
</div>
  