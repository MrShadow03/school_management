@props(['results','section', 'class', 'subjects', 'mid_results', 'final_results'])
<div class="table_box table-thin">
    <div class="table-wrapper">
        <h1 class="text-title pb-1 text-center">Gradebook</h1>
        <p class="fs-14 text-primary text-center">Session: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y') }}</p>
        <p class="fs-14 text-primary text-center">Class: {{ $class }}</p>
        <p class="fs-14 text-primary text-center pb-2 border-bottom">Section: {{ $section->name }}</p>
        <table class="w-100 mt-2 settings-table">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Subjects</th>
                    <th class="heading-column text-title-column">CQ</th>
                    <th class="heading-column text-title-column">MCQ</th>
                    <th class="heading-column text-title-column">Total</th>
                    <th class="heading-column text-title-column">Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $subject->name }}</td>
                    <td class="body-column text-body-column">{!! ($results->where('subject_id', $subject->id)->first() ?? '') ? ($results->where('subject_id', $subject->id)->first()->cq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{!! ($results->where('subject_id', $subject->id)->first() ?? '') ? ($results->where('subject_id', $subject->id)->first()->mcq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{{ $results->where('subject_id', $subject->id)->first()->total ?? '' }}</td>
                    <td class="body-column text-body-column">{{ $results->where('subject_id', $subject->id)->first()->grade ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>