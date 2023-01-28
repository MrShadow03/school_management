@props(['departments'])
<div class="table_box table-thin">
    <div class="table-wrapper">
        <h1 class="text-title pb-1 text-center">Add Departments</h1>
        <form action="{{ route('admin.departments.store') }}" method="POST" class="filter-form">
            @csrf
            <div class="input_group" style="grid-gap: 1rem">
                <div class="input_field">
                    <input class="m-0" type="text" id="name" name="name" value="" placeholder="Marks" required>
                    @error('name')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn" style="padding-block: 11px;"><i class="fa-regular fa-pen-to-square"></i> Create</button>
            </div>
        </form>
        <table class="w-100 mt-2 settings-table">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">ID</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $department->id }}</td>
                    <td class="body-column text-body-column">{{ $department->name }}</td>
                    <td class="body-column text-body-column">
                        <a href="#" class="btn btn-sm btn-primary" onclick="placeData(this.parentNode)">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>