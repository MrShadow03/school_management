@php
    //get todays day name from carbon
    $today = \Carbon\Carbon::now()->dayName;
@endphp
@props(['routine','times'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Students</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100 routine-table">
            <thead>
                <tr class="heading-row text-center">
                    <th class="heading-column text-title-column"></th>
                    <th class="heading-column text-title-column @if ($today == 'Saturday') {{ 'column-highlight' }} @endif">Saturday</th>
                    <th class="heading-column text-title-column @if ($today == 'Sunday') {{ 'column-highlight' }} @endif">Sunday</th>
                    <th class="heading-column text-title-column @if ($today == 'Monday') {{ 'column-highlight' }} @endif">Monday</th>
                    <th class="heading-column text-title-column @if ($today == 'Tuesday') {{ 'column-highlight' }} @endif">Tuesday</th>
                    <th class="heading-column text-title-column @if ($today == 'Wednesday') {{ 'column-highlight' }} @endif">Wednesday</th>
                    <th class="heading-column text-title-column @if ($today == 'Thursday') {{ 'column-highlight' }} @endif">Thursday</th>
                    <th class="heading-column text-title-column @if ($today == 'Friday') {{ 'column-highlight' }} @endif">Friday</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($times as $time)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ Carbon\Carbon::parse($time)->format('h:i a') ?? ''}}</td>
                    <td class="body-column text-body-column saturday @if ($today == 'Saturday') {{ 'column-highlight' }} @endif">
                        @foreach ($routine as $routin)
                            @if ($routin->day == 'Saturday' && $routin->start_time == $time)
                                {{ $routin->subject->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                    <td class="body-column text-body-column sunday @if ($today == 'Sunday') {{ 'column-highlight' }} @endif">
                        @foreach ($routine as $routin)
                            @if ($routin->day == 'Sunday' && $routin->start_time == $time)
                                {{ $routin->subject->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                    <td class="body-column text-body-column monday @if ($today == 'Monday') {{ 'column-highlight' }} @endif">
                        @foreach ($routine as $routin)
                            @if ($routin->day == 'Monday' && $routin->start_time == $time)
                                {{ $routin->subject->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                    <td class="body-column text-body-column tuesday @if ($today == 'Tuesday') {{ 'column-highlight' }} @endif">
                        @foreach ($routine as $routin)
                            @if ($routin->day == 'Tuesday' && $routin->start_time == $time)
                                {{ $routin->subject->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                    <td class="body-column text-body-column wednesday @if ($today == 'Wednesday') {{ 'column-highlight' }} @endif">
                        @foreach ($routine as $routin)
                            @if ($routin->day == 'Wednesday' && $routin->start_time == $time)
                                {{ $routin->subject->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                    <td class="body-column text-body-column thursday @if ($today == 'Thursday') {{ 'column-highlight' }} @endif">
                        @foreach ($routine as $routin)
                            @if ($routin->day == 'Thursday' && $routin->start_time == $time)
                                {{ $routin->subject->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                    <td class="body-column text-body-column friday @if ($today == 'Friday') {{ 'column-highlight' }} @endif">
                        @foreach ($routine as $routin)
                            @if ($routin->day == 'Friday' && $routin->start_time == $time)
                                {{ $routin->subject->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>