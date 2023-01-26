@props(['grades'])
<div class="table_box table-thin">
    <div class="table-wrapper" style="max-height: unset;">
        <form action="{{ route('admin.account.store') }}" method="post" class="filter-form">
            @csrf
            <input type="text" name="name" class="input-field-title" placeholder="Title here" required>
            <div class="input_group" style="grid-gap: 1rem; position: relative; z-index: 1;">
                <div class="input_field">
                    <select name="classes[]" id="classes" class="input-field-select" style="margin: 0 !important;" multiple required placeholder="Select classes">
                        <option value="3">three</option>
                        <option value="4">four</option>
                        <option value="5">five</option>
                        <option value="6">six</option>
                        <option value="7">seven</option>
                        <option value="8">eight</option>
                        <option value="9">nine</option>
                        <option value="10">ten</option>
                    </select>
                    @error('name')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="input_group_wrapper" style="z-index: 0; position: relative;">
                <div class="input_group" style="grid-gap: 1rem">
                    <div class="input_field">
                        <input type="text" id="key1" name="key1" placeholder="Expance name" required>
                    </div>
                    <div class="input_field">
                        <input type="number" id="value1" name="value1" placeholder="Cost" onkeyup="totalCost()" required>
                    </div>
                </div>
            </div>
            <div class="btn-group mt-2">
                <div class="mb-1">
                    <span onclick="addAnother()" onkeydown="handleKeyPress(event)" class="btn-sm btn1"><i class="fa-regular fa-plus"></i> Add another</span>
                    <span onclick="removeLast()" onkeydown="handleKeyPress(event)" class="btn-sm btn2"><i class="fa-regular fa-minus"></i> Remove last</span>    
                </div>
            </div>
            <p class="form_subtitle mt-1"><i class="fa-solid fa-info-circle"></i> Press &nbsp;<span style="font-family: monospace;">ctrl+<i class="fa-regular fa-arrow-down"></i></span>&nbsp; to add another field!</p>
            <div class="input_group mt-1">
                <div class="input_field">
                    <label for="total_cost">Total cost</label>
                    <input type="number" id="total_cost" name="total" placeholder="Total cost" required>
                    <input type="hidden" id="number_of_key_value_pairs" name="number_of_key_value_pairs">
                </div>
            </div>
            <div class="text-center mt-1">
                <button type="submit" class="button-primary" style="padding-block: 11px;"><i class="fa-regular fa-pen-to-square"></i> &nbsp; Create</button>
            </div>
        </form>
    </div>
</div>