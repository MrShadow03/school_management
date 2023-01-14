@props(['results','section', 'class', 'subjects', 'mid_results', 'final_results'])
<div class="table_box table-thin">
    <div class="table-wrapper">
        <h1 class="text-title pb-1 text-center">Gradebook</h1>
        <p class="fs-14 text-primary text-center">Session: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y') }}</p>
        <p class="fs-14 text-primary text-center">Class: {{ $class }}</p>
        <p class="fs-14 text-primary text-center pb-2 border-bottom">Section: {{ $section->name }}</p>
        <table class="w-100 mt-2">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Subjects</th>
                    <th class="heading-column text-title-column">Total Marks</th>
                    <th class="heading-column text-title-column">CQ</th>
                    <th class="heading-column text-title-column">MCQ</th>
                    <th class="heading-column text-title-column">Total</th>
                    <th class="heading-column text-title-column border-right">Grade</th>
                    
                    <th class="heading-column text-title-column">CQ</th>
                    <th class="heading-column text-title-column">MCQ</th>
                    <th class="heading-column text-title-column">Total</th>
                    <th class="heading-column text-title-column">Grade</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_marks = 0;
                @endphp
                @foreach ($subjects as $subject)
                <tr class="body-row">
                    <td class="body-column text-body-column lan-ban fs-16">{{ $subject->name }}</td>
                    <td class="body-column text-body-column lan-ban fs-16">{{ $subject->total_marks }}</td>
                    <td class="body-column text-body-column">{!! ($mid_results->where('subject_id', $subject->id)->first() ?? '') ? ($mid_results->where('subject_id', $subject->id)->first()->cq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{!! ($mid_results->where('subject_id', $subject->id)->first() ?? '') ? ($mid_results->where('subject_id', $subject->id)->first()->mcq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{{ $mid_results->where('subject_id', $subject->id)->first()->total ?? '' }}</td>
                    <td class="body-column text-title-column border-right {{  $mid_results->where('subject_id', $subject->id)->first()->grade == 'F' ? 'text-alert':'' }}">{{ $mid_results->where('subject_id', $subject->id)->first()->grade ?? '' }}</td>
                    
                    <td class="body-column text-body-column">{!! ($final_results->where('subject_id', $subject->id)->first() ?? '') ? ($final_results->where('subject_id', $subject->id)->first()->cq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{!! ($final_results->where('subject_id', $subject->id)->first() ?? '') ? ($final_results->where('subject_id', $subject->id)->first()->mcq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{{ $final_results->where('subject_id', $subject->id)->first()->total ?? '' }}</td>
                    <td class="body-column text-title-column {{  $final_results->where('subject_id', $subject->id)->first()->grade == 'F' ? 'text-alert':'' }} ">{{ $final_results->where('subject_id', $subject->id)->first()->grade ?? '' }}</td>
                    @php
                        $total_marks += $subject->total_marks;
                    @endphp
                </tr>
                @endforeach
                <tr class="body-row border-top">
                    <td class="body-column text-title-column pt-2">Grand Total</td>
                    <td class="body-column text-title-column">{{ $total_marks }}</td>
                    <td class="body-column text-body-column">...</td>
                    <td class="body-column text-body-column">...</td>
                    <td class="body-column text-title-column">{!! ($mid_results->where('grand_total', 1)->first() ?? '') ? ($mid_results->where('grand_total', 1)->first()->total ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-title-column {{  $mid_results->where('grand_total', 1)->first()->grade == 'F' ? 'text-alert':'' }} ">{!! ($mid_results->where('grand_total', 1)->first() ?? '') ? ($mid_results->where('grand_total', 1)->first()->grade ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-title-column">{!! ($final_results->where('grand_total', 1)->first() ?? '') ? ($final_results->where('grand_total', 1)->first()->total ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-title-column {{  $final_results->where('grand_total', 1)->first()->grade == 'F' ? 'text-alert':'' }} ">{!! ($final_results->where('grand_total', 1)->first() ?? '') ? ($final_results->where('grand_total', 1)->first()->grade ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>