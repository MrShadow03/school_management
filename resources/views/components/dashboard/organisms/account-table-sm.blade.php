@props(['grades'])
<div class="table_box table-card card-head">
    <div class="table-wrapper-card">
        <div class="heading">
            <h1 class="text-title pb-1 pt-2 text-center">Grade Table</h1>
            <p class="fs-14 text-primary text-center pb-2 border-bottom">Session: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y') }}</p>
            <p class="pb-1 pt-1 form_subtitle fs-18 text-center"><i class="fa-light fa-angle-down"></i></p>
        </div>
        <div class="details card-content" data-simple-scroll>
            <table class="w-100">
                <thead>
                    <tr class="heading-row">
                        <th class="heading-column text-title-column">Name</th>
                        <th class="heading-column text-title-column">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column">Dressing</td>
                        <td class="body-column text-body-column">300tk</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>