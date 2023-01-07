@props(['students','section','subject','year','type'])
<div class="table_box grid-row2">
    <h1 class="text-title text-center">{{ $subject->name }}</h1>
    <p class="fs-14 text-primary text-center">Class: {{ $subject->class }}</p>
    <p class="fs-14 text-primary text-center">Section: {{ $section->name }}</p>
    <p class="fs-14 text-primary text-center pb-2 border-bottom">Exam: {{ $type == 'mid'? 'Mid-term' : ($type == 'final'? 'Final' : 'Test') }}</p>
    <div class="table-wrapper-alt">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Roll</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column text-center">Class</th>
                    <th class="heading-column text-title-column text-center">CQ</th>
                    @if ($subject->mcq)
                    <th class="heading-column text-title-column text-center">MCQ</th>
                    @endif
                    @if ($subject->practical)
                    <th class="heading-column text-title-column text-center">Practical</th>
                    @endif
                    <th class="heading-column text-title-column text-center">Options</th>
                </tr>
            </thead>
        </table>
    </div>
    @foreach ($students as $student)
    <form class="table-wrapper-alt" action="{{ route('teacher.result_upload.store') }}" method="POST">
        @csrf
        @method('POST')
        <table class="w-100">
            <tbody>
                <input type="hidden" name="type" value="{{ old('type', $type) }}">
                <input type="hidden" name="year" value="{{ old('year', $year) }}">
                <input type="hidden" name="subject_id" value="{{ old('subject_id', $subject->id) }}">
                <input type="hidden" name="section_id" value="{{ old('section_id', $section->id) }}">
                <input type="hidden" name="student_id" value="{{ old(' ', $student->id) }}">
                <tr class="body-row">
                    <td class="body-column text-body-column text-center">{{ $student->class_roll }}</td>
                    <td class="body-column text-body-column">{{ $student->name }}</td>
                    <td class="body-column text-body-column text-center">{{ $student->class }}</td>
                    <td class="body-column text-body-column text-center">
                        <input type="number" name="cq_{{ $student->id }}" id="cq" class="input-box" value="{{ old('cq'.$student->id) }}" required>
                        @error('cq_'.$student->id, 'form'.$student->id)
                            <p class="input_error">{{ $message }}</p>
                        @enderror
                    </td>
                    @if ($subject->mcq)
                    <td class="body-column text-body-column text-center">
                        <input type="number" name="mcq_{{ $student->id }}" id="mcq" class="input-box" value="{{ old('mcq'.$student->id) }}" required>
                        @error('mcq_'.$student->id, 'form'.$student->id)
                            <p class="input_error">{{ $message }}</p>
                        @enderror
                    </td>
                    @endif
                    @if ($subject->practical)
                    <td class="body-column text-body-column text-center">
                        <input type="number" name="practical_{{ $student->id }}" id="practical" class="input-box" value="{{ old('practical'.$student->id) }}" required>
                        @error('practical_'.$student->id, 'form'.$student->id)
                            <p class="input_error">{{ $message }}</p>
                        @enderror
                    </td>
                    @endif
                    <td class="body-column text-body-column text-center">
                        <button type="submit" class="button-30">Save</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    @endforeach
</div>