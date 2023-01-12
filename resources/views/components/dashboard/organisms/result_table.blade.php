@props(['results','section', 'class'])
<div class="table_box table-thin">
    <div class="table-wrapper">
        <h1 class="text-title pb-1 text-center">Gradebook</h1>
        <p class="fs-14 text-primary text-center pb-2 border-bottom">Session: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y') }}</p>
        <p class="fs-14 text-primary text-center pb-2 border-bottom">Class: {{ $class }}</p>
        <p class="fs-14 text-primary text-center pb-2 border-bottom">Section: {{ $section }}</p>
        <pre>{{ print_r($results) }}</pre>
        <table class="w-100 mt-2 settings-table">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Grade Latters</th>
                    <th class="heading-column text-title-column">Obtaining Marks (%)</th>
                    <th class="heading-column text-title-column">Comments</th>
                    <th class="heading-column text-title-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="body-row">
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-body-column"></td>
                    <td class="body-column text-body-column">
                        <a href="#" class="btn btn-sm btn-primary" onclick="placeData(this.parentNode)">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>