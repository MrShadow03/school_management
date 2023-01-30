@props(['appointments','doctors','doctor'])
<div class="table_box">
    <div class="title">
        <h2 class="text-title pb-2 print-none">Appointments</h2>
        @if (isset($doctor))
            <p class="print-only" style="font-size: 14px">Appointments,</p>
            <p class="print-only pb-1" style="font-size: 14px">South Apollo Diagnostic Complex -Pvt Ltd, Barisal</p>
            <p class="print-only" style="font-size: 16px">{{$doctor}}</p>
            <p class="form_subtitle print-only mb-1 pb-1 border-bottom">Date: {{ date('d F, Y') }}</p>        
        @endif
        <button type="submit" class="btn print-none" onclick="window.print()" style="padding-block: 11px;"><i class="fa-regular fa-print"></i> Print</button>
    </div>
    <div class="table-wrapper">
        <form action="{{ route('admin.appointments.filter') }}" method="POST" class="filter-form print-none">
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
                    <th class="heading-column text-title-column">Contact no.</th>
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
                        <td class="body-column text-body-column">{{$appointment->contact_number}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>