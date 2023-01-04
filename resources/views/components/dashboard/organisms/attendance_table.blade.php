@props(['own_sections','current_section','date','attendances','students'])
<div class="attendence_contant">
    {{-- <div class="attendence_form">
        <h3>Student Attendece</h3>
        <form action="#">
            <div class="attendece_select">
                <label for="#">Select Class</label>
                <select class="form_select">
                    <option selected>Select Class</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="attendece_select">
                <label for="#">Select Secton</label>
                <select class="form_select">
                    <option selected>Select Secton</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="attendece_select">
                <label for="#">Select Month</label>
                <select class="form_select">
                    <option selected>Select Month</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="attendece_select">
                <label for="#">Select Session</label>
                <select class="form_select">
                    <option selected>Select Session</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </form>
        <div class="btn_area">
            <button>Save</button>
            <button>Resat</button>
        </div>
    </div> --}}
    <div class="attendence_table_box">
        <div class="table_title">
            <div class="class_name">
                <p class="fs-18 text-primary text-center pb-1">Class <span>{{ $current_section->class }} : </span>Section <span>{{ $current_section->name }}</span></p>
                <p class="fs-14 text-primary text-center pb-2">{{ Carbon\Carbon::parse($date)->format('F, Y') }}</p>
            </div>
        </div>
        <form action="{{ route('teacher.attendance.filter') }}" method="POST" class="filter-form">
            @csrf
            <div class="input_group" style="grid-gap: 1rem">
                <div class="input_field">
                    <select name="section_id" id="section_id" required>
                        <option value="" selected disabled>Select section</option>
                        @foreach ($own_sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }} - class {{ $section->class }}</option>        
                        @endforeach
                    </select>
                    @error('section_id')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
                <div class="input_field">
                    <input class="m-0" type="month" id="month" name="month" value="{{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('o-m') }}" required>
                    @error('month')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn" style="padding-block: 11px;"><i class="fa-regular fa-sliders"></i> Filter</button>
            </div>
        </form>
        <div class="table-wrapper pt-2">
            <table class="w-100 attendance-table">
                <thead>
                    <tr class="heading-row">
                        <th class="heading-column text-title-column">Students</th>
                        @for ($i = 1; $i <= 31; $i++)
                        <th class="heading-column text-title-column">{{ $i }}</th>   
                        @endfor
                        <th class="heading-column text-title-column">Present</th>
                        <th class="heading-column text-title-column">Absent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr class="body-row">
                        @php
                            $pre_count = 0;
                            $abs_count = 0;
                        @endphp
                        <td class="body-column text-body-column">{{ $student->name }}</td>
                        @for ($i = 1; $i <= 31; $i++)
                        <td class="body-column text-body-column">
                            @php
                                $max_i = count($attendances);
                                $init_i = 0;
                                $a = true;
                            @endphp
                            @foreach ($attendances as $attendance)
                                @php
                                    $init_i++;
                                @endphp
                                @if ($attendance->student_id == $student->id && Carbon\Carbon::parse($attendance->date)->format('d') == $i)
                                    @php
                                        $a = false;
                                    @endphp
                                    @if ($attendance->attendance === 1)
                                        <i class="las la-check"></i>
                                        @php
                                            $pre_count++;
                                        @endphp
                                        @break
                                    @elseif(!$attendance->attendance)
                                        <i class="las la-times"></i>
                                        @php
                                            $abs_count++;
                                        @endphp
                                        @break
                                    @endif
                                @elseif($init_i == $max_i && $a)
                                    <i class="las la-ellipsis-h"></i>
                                @endif
                            @endforeach
                        </td>
                        @endfor
                        <td class="body-column text-body-column">{{ $pre_count }}</td>
                        <td class="body-column text-body-column">{{ $abs_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
