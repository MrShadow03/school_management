@props(['routines'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Students</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Class</th>
                    <th class="heading-column text-title-column">Section</th>
                    <th class="heading-column text-title-column">Subject</th>
                    <th class="heading-column text-title-column">Day</th>
                    <th class="heading-column text-title-column">Time</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach ($routines as $routine)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $routine->class ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $routine->section->name ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $routine->subject->name ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $routine->day ?? ''}}</td>
                    <td class="body-column text-body-column">{{ Carbon\Carbon::parse($routine->start_time)->format('h:i a') ?? ''}}</td>
                    <td class="body-column text-body-column"><a href="#">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>