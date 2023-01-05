@props(['permissions'])
<div class="table_box grid-row2 table-thin">
    <div class="table-wrapper">
        <h1 class="text-title pb-1 text-center">Result Upload Permissions</h1>
        <p class="fs-14 text-primary text-center pb-2 border-bottom">Session: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y') }}</p>
        <table class="w-100 mt-2 settings-table">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Permissions</th>
                    <th class="heading-column text-title-column">Current Status</th>
                    <th class="heading-column text-title-column">Change</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                @php
                    $name = $permission->name == 'mid_result_uploading_permission' ? 'Mid-Term Result Upload' : ($permission->name == 'final_result_uploading_permission' ? 'Final Result Upload' : 'Test Result Upload');
                    $current_status = $permission->status ? 'Allowed' : 'Not Allowed';
                    $change_status = $permission->status ? 0 : 1;
                @endphp
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $name }}</td>
                    <td class="body-column text-body-column"><span class="{{ $permission->status ? 'alert-success' : 'alert-danger' }}">{!! $permission->status?'<i class="fa-regular fa-unlock"></i>':'<i class="fa-regular fa-lock"></i>' !!} &nbsp; {{ $current_status }}</span></td>
                    <td class="body-column text-body-column">
                        <form action="{{ route('admin.exam_permission.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="id" value="{{ $permission->id }}">
                            <input type="hidden" name="status" value="{{ $change_status }}">
                            <button type="submit" class="button-30">{{ $permission->status? 'Deny' : 'Allow' }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>