@props(['section', 'class', 'students', 'available_sections', 'promoted_section_id', 'promoted_students'])
<div class="table_box">
    <div class="table-wrapper d-flex">
        <table class="w-100 h-fit">
            <thead>
                <tr class="heading-row border-bottom">
                    <th class="heading-column text-title-column border-right text-center" colspan="4">From <span class="column-title">{{ $section->name }}</span></th>
                </tr>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Roll</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Marks</th>
                    <th class="heading-column text-title-column text-center border-right">Promote</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($students as $student)
                    <tr class="body-row {{ $student->grade == 'F' ? 'alert-danger':'alert-success' }}">
                        <td class="body-column text-body-column">{{ $student->student->class_roll }}</td>
                        <td class="body-column text-body-column">{{ $student->student->name }}</td>
                        <td class="body-column text-body-column">{{ $student->total }}</td>
                        <td class="body-column text-body-column text-center border-right"><a class="{{ $student->grade == 'F' ? 'btn-table-danger':'btn-table' }}" href="{{ route('admin.promotion.single.update',[$student->student->id, $promoted_section_id]) }}">{{ $student->grade == 'F' ? 'Force Promote':'Promote' }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="w-100 h-fit">
            <thead>
                <tr class="heading-row border-bottom">
                    <th class="heading-column text-title-column text-center" colspan="3">To 
                        <select name="promotion_section" class="title-select" id="promotion_section">
                            @if ($available_sections->count() <= 0)
                                <option value="0">No Section Available</option>
                            @endif
                            @foreach ($available_sections as $available_section)
                                <option value="{{ $available_section->id }}">{{ $available_section->name }}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Roll</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Marks</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($promoted_students as $promoted_student)
                    <tr class="body-row">
                        <td class="body-column text-body-column border-left">{{ $promoted_student->student->class_roll }}</td>
                        <td class="body-column text-body-column">{{ $promoted_student->student->name }}</td>
                        <td class="body-column text-body-column">{{ $promoted_student->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>