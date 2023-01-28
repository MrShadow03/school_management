@props(['assistants'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">assistants</h2>
    </div>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Id</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column">Class</th>
                    <th class="heading-column text-title-column">Teacher</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            @php
                $i = 1;
            @endphp
            <tbody>
                @foreach ($assistants as $assistant)
                <tr class="body-row">
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-body-column"></td>
                    <input type="hidden" name="id" value="">
                    <td class="body-column text-body-column"><a href="#" onclick="dataToForm(this)">Edit</a></td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>