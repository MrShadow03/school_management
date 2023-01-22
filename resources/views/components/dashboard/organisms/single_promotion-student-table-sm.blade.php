@props(['students','section','subject','year','type'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Students</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Index</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Roll</th>
                    <th class="heading-column text-title-column">CQ</th>
                    @if ($subject->mcq)
                    <th class="heading-column text-title-column">MCQ</th>
                    @endif
                    @if ($subject->practical)
                    <th class="heading-column text-title-column">Practical</th>
                    @endif
                    <th class="heading-column text-title-column">Total</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @php
                    $i = 1;
                @endphp
                @foreach ($students as $student)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $i}}</td>
                    <td class="body-column text-body-column">{{ $student->name ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $student->class_roll ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $student->cq ?? '' }}</td>
                    @if ($subject->mcq)
                    <td class="body-column text-body-column">{{ $student->mcq ?? ''}}</td>
                    @endif
                    @if ($subject->practical)
                    <td class="body-column text-body-column">{{ $student->practical ?? ''}}</td>
                    @endif
                    <td class="body-column text-body-column">{{ $student->total ?? '' }}</td>
                    <td class="body-column text-body-column">
                        <a href="#">View</a>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>