@props(['grades'])
<div class="table_box table-thin">
    <div class="table-wrapper" style="max-height: unset;">
        <form action="{{ route('admin.grade.update') }}" method="POST" class="filter-form">
            @method('PATCH')
            @csrf
            <input type="text" name="name" class="input-field-title" placeholder="Title here">
            <div class="input_group" style="grid-gap: 1rem; position: relative; z-index: 1;">
                <div class="input_field">
                    <select name="classes[]" id="classes" class="input-field-select" style="margin: 0 !important;" multiple required placeholder="Select classes">
                        <option value="1">one</option>
                        <option value="2">two</option>
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
                        <input type="text" id="key1" name="key1" placeholder="Expance name">
                    </div>
                    <div class="input_field">
                        <input type="text" id="value1" name="value1" placeholder="Cost">
                    </div>
                </div>
            </div>
            <div class="btn-group mt-2">
                <span onclick="addAnother()" onkeydown="handleKeyPress(event)" class="btn btn1" style="padding-block: 11px;"><i class="fa-regular fa-plus"></i> Add another</span>
                <span onclick="removeLast()" onkeydown="handleKeyPress(event)" class="btn btn2" style="padding-block: 11px;"><i class="fa-regular fa-plus"></i> Remove last</span>
                <button type="submit" class="button-31" style="padding-block: 11px;"><i class="fa-regular fa-pen-to-square"></i> &nbsp; Create</button>
            </div>
        </form>
    </div>
</div>