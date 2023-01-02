@props(['students','section_name'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">{{ $section_name }}'s Attendance</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Roll</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Class</th>
                    <th class="heading-column text-title-column text-center border-right">Attendance</th>
                    <th class="heading-column text-title-column text-center">Confirm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $student->class_roll ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $student->name ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $student->class ?? ''}}</td>
                    @if ($student->attendances->isNotEmpty() && $student->attendances[0]->date == date('Y-m-d'))
                    <td class="body-column text-body-column text-center border-right">
                        @if ($student->attendances[0]->attendance)
                        <span><i class="fa-solid fa-check text-success"></i></span>
                        @else
                        <span><i class="fa-solid fa-xmark text-alert"></i></span>
                        @endif
                        <form action="{{ route('teacher.attendance.destroy', $student->id) }}" method="POST" class="d-inline pl-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <button type="submit" style="{{ $student->attendances[0]->attendance ? '' : 'margin-left:5px' }}" class="button-30">Retake</button>
                        </form>
                    </td>    
                    @else
                    <td class="body-column text-body-column text-center border-right">
                        <form action="{{ route('teacher.attendance.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                            <input type="hidden" id="attendance_input_{{ $student->id }}" name="attendance" value="">
                            <button type="submit" class="button-30" onclick="setAttendanceValue(event, 1, {{ $student->id }})">Present</button>
                            <button type="submit" class="button-30" onclick="setAttendanceValue(event, 0, {{ $student->id }})">Absent</button>
                        </form>
                    </td>
                    @endif
                    <td class="body-column text-body-column text-center">
                        @if ($student->attendances->isNotEmpty())
                            <a href="{{ route('teacher.attendance.update', $student->id) }}" class="button-30">{{ $student->attendances[0]->attendance ? 'Absent' : 'Present' }}</a>
                        @else
                            <span>...</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
