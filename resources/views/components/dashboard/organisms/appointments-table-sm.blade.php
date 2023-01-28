@props(['appointments','doctors'])
<div class="table_box">
    <div class="title">
        <h2 class="text-title pb-2">Appointments</h2>
    </div>
    <div class="table-wrapper">
        <form action="{{ route('admin.appointments.filter') }}" method="POST" class="filter-form">
            @csrf
            <div class="input_group" style="grid-gap: 1rem">
                <div class="input_field">
                    <select name="doctor_id" id="doctor_id" class="m-0" onchange="this.form.submit()">
                        <option value="">Filter by doctor</option>
                        <option value="0">All</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn" style="padding-block: 11px;"><i class="fa-regular fa-magnifying-glass"></i> Search</button>
            </div>
        </form>
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">SL.</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Age</th>
                    <th class="heading-column text-title-column">Doctor</th>
                </tr>
            </thead>
            @php
                $i = 1;
            @endphp
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr class="body-row">
                        <td class="body-column text-body-column">{{$appointment->serial_number}}</td>
                        <td class="body-column text-body-column">{{$appointment->name}}</td>
                        <td class="body-column text-body-column">{{$appointment->age}}</td>
                        <td class="body-column text-body-column">{{$appointment->doctor->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>