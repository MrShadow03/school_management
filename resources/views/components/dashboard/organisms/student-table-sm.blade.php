@props(['students'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Students</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Roll</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Class</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $student->class_roll ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $student->name ?? ''}}</td>
                    <td class="body-column text-body-column">{{ $student->class ?? ''}}</td>
                    <td class="body-column text-body-column"><a href="#">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
