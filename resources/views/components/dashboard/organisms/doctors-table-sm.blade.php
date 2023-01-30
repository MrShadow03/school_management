@props(['doctors'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Doctors</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Index</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Status</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            @php
                $i = 1;
            @endphp
            <tbody>
                @foreach ($doctors as $doctor)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $i }}</td>
                    <td class="body-column text-body-column">{{ $doctor->name }}</td>
                    <td class="body-column text-body-column {{ $doctor->status ? 'text-success' : 'text-danger' }}">{{ $doctor->status ? 'Active' : 'Inactive' }}</td>
                    <td class="body-column text-body-column">
                        <a href="{{ route('admin.doctors.changeStatus', [$doctor->id ,$doctor->status]) }}" class="btn btn-sm btn-primary" onclick="placeData(this.parentNode)">{!! $doctor->status ? '<i class="fa-regular fa-thumbs-down"></i>' : '<i class="fa-regular fa-thumbs-up"></i>' !!}</a>
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