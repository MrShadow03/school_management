@props(['sections'])
<div class="table_box grid-row2">
    <div class="title">
        <h2 class="text-title pb-2">Sections</h2>
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
            <x-dashboard.molecules.table-sm-row w="Galib" :sections="$sections"/>
        </table>
    </div>
</div>