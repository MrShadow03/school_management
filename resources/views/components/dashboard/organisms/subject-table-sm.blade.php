@props(['subjects'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Subjects</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Subject Code</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column border-right">Class</th>
                    <th class="heading-column text-title-column border-right">Total</th>
                    <th class="heading-column text-title-column border-right">CQ</th>
                    <th class="heading-column text-title-column border-right">MCQ</th>
                    <th class="heading-column text-title-column border-right">Practical</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $subject->id }}</td>
                    <td class="body-column text-body-column">{{ $subject->name }}</td>
                    <td class="body-column text-body-column border-right">{{ $subject->class }}</td>
                    <td class="body-column text-body-column border-right">{{ $subject->total_marks }}</td>
                    <td class="body-column text-body-column border-right">{{ $subject->cq }}</td>
                    <td class="body-column text-body-column border-right">{{ $subject->mcq }}</td>
                    <td class="body-column text-body-column border-right">{{ $subject->practical }}</td>
                    <td class="body-column text-body-column"><a href="#" onclick="dataToForm(this)">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>