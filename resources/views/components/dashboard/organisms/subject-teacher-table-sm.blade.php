@props(['items'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Subjects</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Class</th>
                    <th class="heading-column text-title-column">Sections</th>
                    <th class="heading-column text-title-column">Subject</th>
                    <th class="heading-column text-title-column">Teacher</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                @php
                    $section_id = $item->section_id;
                    $section_name = $item->section->name;
                    $subject_id = $item->subject_id;
                    $subject_name = $item->subject->name;
                    $teacher_id = $item->teacher_id;
                    $teacher_name = $item->teacher->name;
                @endphp
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $item->class??'' }}</td>
                    <td class="body-column text-body-column">{{ $item->section->name??'' }}</td>
                    <td class="body-column text-body-column">{{ $item->subject->name??'' }}</td>
                    <td class="body-column text-body-column">{{ $item->teacher->name??'' }}</td>
                    <td class="body-column text-body-column">
                        <a href="#" onclick="dataToForm({{ json_encode(['id'=>$item->id,'class'=>$item->class,'section'=>[$section_id,$section_name],'subject'=>[$subject_id,$subject_name],'teacher'=>[$teacher_id,$teacher_name]]) }})">Edit</a>
                        <form class="d-inline" action="{{ route('admin.assign-subject-teacher.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('You want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>