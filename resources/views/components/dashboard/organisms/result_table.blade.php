@props(['results','section', 'class', 'subjects', 'mid_results', 'final_results'])
<div class="table_box table-thin">
    <div class="table-wrapper">
        <h1 class="text-title pb-1 text-center">Gradebook of {{ Auth::user()->name }}</h1>
        <p class="fs-14 text-primary text-center">Session: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y') }}</p>
        <p class="fs-14 text-primary text-center">Class: {{ $class }}</p>
        <p class="fs-14 text-primary text-center pb-2">Section: {{ $section->name }}</p>
        <table class="w-100 mt-2">
            @php
                $cq_colspan = $results->where('cq', '!=', null)->count() > 0 ? 1 : 0;
                $mcq_colspan = $results->where('mcq', '!=', null)->count() > 0 ? 1 : 0;
                $practical_colspan = $results->where('practical', '!=', null)->count() > 0 ? 1 : 0;

                $total_colspan = $cq_colspan + $mcq_colspan + $practical_colspan;
            @endphp
            <thead>
                <tr class="heading-row border-bottom border-top">
                    <th class="heading-column text-title-column" ></th>
                    <th class="heading-column text-title-column border-right" ></th>
                    <th class="heading-column text-title-column text-center border-right" colspan="{{ $total_colspan+2 }}" >Mid-term Results</th>
                    
                    @if ($final_results->count() > 0)
                    <th class="heading-column text-title-column text-center border-right" colspan="{{ $total_colspan+2 }}" >Annual Results</th>
                    @endif
                    
                    @if ($final_results->count() > 0)
                    <th class="heading-column text-title-column text-center" colspan="{{ $total_colspan+2 }}" >Final Results</th>
                    @endif
                        
                </tr>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Subjects</th>
                    <th class="heading-column text-title-column border-right">Total Marks</th>
                    <th class="heading-column text-title-column">CQ</th>
                    <th class="heading-column text-title-column">MCQ</th>
                    @if ($practical_colspan)
                    <th class="heading-column text-title-column">PRC.</th>
                    @endif
                    <th class="heading-column text-title-column">Total</th>
                    <th class="heading-column text-title-column border-right">Grade</th>
                    
                    @if ($final_results->count() > 0)
                    <th class="heading-column text-title-column">CQ</th>
                    <th class="heading-column text-title-column">MCQ</th>
                    @if ($practical_colspan)
                    <th class="heading-column text-title-column">PRC.</th>
                    @endif
                    <th class="heading-column text-title-column">Total</th>
                    <th class="heading-column text-title-column border-right">Grade</th>
                    @endif
                    
                    @if ($final_results->count() > 0)
                    <th class="heading-column text-title-column">CQ</th>
                    <th class="heading-column text-title-column">MCQ</th>
                    @if ($practical_colspan)
                    <th class="heading-column text-title-column">PRC.</th>
                    @endif
                    <th class="heading-column text-title-column">Total</th>
                    <th class="heading-column text-title-column">Grade</th>
                    @endif
                        
                </tr>
            </thead>
            <tbody>
                @php
                    $total_marks = 0;
                    $final_marks = [];
                @endphp
                @foreach ($subjects as $subject)
                <tr class="body-row">
                    <td class="body-column text-body-column lan-ban fs-16">{{ $subject->name }}</td>
                    <td class="body-column text-body-column lan-ban fs-16 border-right">{{ $subject->total_marks }}</td>
                    <td class="body-column text-body-column">{!! ($mid_results->where('subject_id', $subject->id)->first() ?? '') ? ($mid_results->where('subject_id', $subject->id)->first()->cq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{!! ($mid_results->where('subject_id', $subject->id)->first() ?? '') ? ($mid_results->where('subject_id', $subject->id)->first()->mcq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    @if ($practical_colspan)
                    <td class="body-column text-body-column">{!! ($mid_results->where('subject_id', $subject->id)->first() ?? '') ? ($mid_results->where('subject_id', $subject->id)->first()->practical ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    @endif
                    <td class="body-column text-body-column">{{ $mid_results->where('subject_id', $subject->id)->first()->total ?? '' }}</td>
                    <td class="body-column text-title-column border-right {{ $mid_results->where('subject_id', $subject->id)->first() == null ? '' : ($mid_results->where('subject_id', $subject->id)->first()->grade == 'F' ? 'text-alert' : '') }}">{{ $mid_results->where('subject_id', $subject->id)->first()->grade ?? '' }}</td>
                    @if ($final_results->count() > 0)
                    <td class="body-column text-body-column">{!! ($final_results->where('subject_id', $subject->id)->first() ?? '') ? ($final_results->where('subject_id', $subject->id)->first()->cq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-body-column">{!! ($final_results->where('subject_id', $subject->id)->first() ?? '') ? ($final_results->where('subject_id', $subject->id)->first()->mcq ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    @if ($practical_colspan)
                    <td class="body-column text-body-column">{!! ($final_results->where('subject_id', $subject->id)->first() ?? '') ? ($final_results->where('subject_id', $subject->id)->first()->practical ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    @endif
                    <td class="body-column text-body-column">{{ $final_results->where('subject_id', $subject->id)->first()->total ?? '' }}</td>
                    <td class="body-column text-title-column border-right {{ $final_results->where('subject_id', $subject->id)->first() == null ? '' : ($final_results->where('subject_id', $subject->id)->first()->grade == 'F' ? 'text-alert' : '') }} ">{{ $final_results->where('subject_id', $subject->id)->first()->grade ?? '' }}</td>
                    @endif
                    @php
                        $mid_cq = $mid_results->where('subject_id', $subject->id)->first()->cq ?? 0;
                        $mid_mcq = $mid_results->where('subject_id', $subject->id)->first()->mcq ?? 0;
                        $mid_practical = $mid_results->where('subject_id', $subject->id)->first()->practical ?? 0;
                        $mid_total = $mid_results->where('subject_id', $subject->id)->first()->total ?? 0;

                        $final_cq = $final_results->where('subject_id', $subject->id)->first()->cq ?? 0;
                        $final_mcq = $final_results->where('subject_id', $subject->id)->first()->mcq ?? 0;
                        $final_practical = $final_results->where('subject_id', $subject->id)->first()->practical ?? 0;
                        $final_total = $final_results->where('subject_id', $subject->id)->first()->total ?? 0;

                        $overall_cq = round(($mid_cq*0.5) + ($final_cq*0.5));
                        $overall_mcq = round(($mid_mcq*0.5) + ($final_mcq*0.5));
                        $overall_practical = round(($mid_practical*0.5) + ($final_practical*0.5));
                        $overall_total = round(($mid_total*0.5) + ($final_total*0.5));

                        //dd($overall_cq, $overall_mcq, $overall_practical, $overall_total);

                        $total_attainable = App\Models\Subject::find($subject->id)->total_marks;
                        $lowest_attainable = App\Models\Grade::where('name', 'F')->first()->score;
                        $overall_percentage = ($overall_total/$total_attainable)*100;
                        
                        $overall_grade = App\Models\Grade::where('score','<=',$overall_percentage)->orderBy('score','desc')->first()->name;

                        if($class == 9 || $class == 10){
                            $overall_grade = $overall_percentage >= 33 && $overall_percentage < $lowest_attainable ? 'C' : $overall_grade;
                        }
                        $total_marks += $subject->total_marks;
                    @endphp
                    @if ($final_results->count() > 0)
                    <td class="body-column text-body-column">{!! $overall_cq ? $overall_cq : '<i class="las la-ellipsis-h"></i>' !!}</td>
                    <td class="body-column text-body-column">{!! $overall_mcq ? $overall_mcq : '<i class="las la-ellipsis-h"></i>' !!}</td>
                    @if ($practical_colspan)
                    <td class="body-column text-body-column">{!! $overall_practical ? $overall_practical : '<i class="las la-ellipsis-h"></i>' !!}</td>
                    @endif
                    <td class="body-column text-body-column">{!! $overall_total ? $overall_total : '<i class="las la-ellipsis-h"></i>' !!}</td>
                    <td class="body-column text-title-column {{ $overall_grade == 'F' ? 'text-alert':'' }} ">{{ $overall_grade }}</td>
                    @endif
                </tr>
                @endforeach
                <tr class="body-row border-top">
                    <td class="body-column text-title-column pt-2">Grand Total</td>
                    <td class="body-column text-title-column border-right">{{ $total_marks }}</td>
                    <td class="body-column text-body-column">...</td>
                    <td class="body-column text-body-column">...</td>
                    @if ($practical_colspan)
                    <td class="body-column text-body-column">...</td>
                    @endif
                    <td class="body-column text-title-column">{!! ($mid_results->where('grand_total', 1)->first() ?? '') ? ($mid_results->where('grand_total', 1)->first()->total ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-title-column border-right {{ $mid_results->where('grand_total', 1)->first() == null ? '' : ($mid_results->where('grand_total', 1)->first()->grade == 'F' ? 'text-alert' : '') }} ">{!! ($mid_results->where('grand_total', 1)->first() ?? '') ? ($mid_results->where('grand_total', 1)->first()->grade ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>

                    @if($final_results->count() > 0)
                    <td class="body-column text-body-column">...</td>
                    <td class="body-column text-body-column">...</td>
                    @if ($practical_colspan)
                    <td class="body-column text-body-column">...</td>
                    @endif
                    <td class="body-column text-title-column">{!! ($final_results->where('grand_total', 1)->first() ?? '') ? ($final_results->where('grand_total', 1)->first()->total ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-title-column border-right {{ $final_results->where('grand_total', 1)->first() == null ? '' : ($final_results->where('grand_total', 1)->first()->grade == 'F' ? 'text-alert' : '') }} ">{!! ($final_results->where('grand_total', 1)->first() ?? '') ? ($final_results->where('grand_total', 1)->first()->grade ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    @endif
                    
                    @if($final_results->count() > 0)
                    <td class="body-column text-body-column">...</td>
                    <td class="body-column text-body-column">...</td>
                    @if ($practical_colspan)
                    <td class="body-column text-body-column">...</td>
                    @endif
                    <td class="body-column text-title-column">{!! ($results->where('final_total', 1)->first() ?? '') ? ($results->where('final_total', 1)->first()->total ?? '<i class="las la-ellipsis-h"></i>') : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    <td class="body-column text-title-column {{ $results->where('final_total', 1)->first() == null ? '' : ($results->where('final_total', 1)->first()->grade == 'F' ? 'text-alert' : '') }} ">{!! ($results->where('final_total', 1)->first() ?? '') ? $results->where('final_total', 1)->first()->grade : '<i class="fa-light fa-cloud-slash"></i>' !!}</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>