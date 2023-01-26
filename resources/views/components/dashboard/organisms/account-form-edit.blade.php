@props(['account'])
@php
    $classes = json_decode($account->classes, true);
@endphp
<div class="table_box table-thin">
    <div class="table-wrapper" style="max-height: unset;">
        <form action="{{ route('admin.account.update', $account->id) }}" method="post" class="filter-form">
            @method('PATCH')
            @csrf
            <input type="text" name="name" class="input-field-title" placeholder="Title here" value="{{ $account->name }}" required>
            <div class="input_group" style="grid-gap: 1rem; position: relative; z-index: 1;">
                <div class="input_field">
                    <select name="classes[]" id="classes" class="input-field-select" style="margin: 0 !important;" multiple required placeholder="Select classes">
                        <option value="3" {{ in_array('3', $classes) ? 'selected' : '' }}>Three</option>
                        <option value="4" {{ in_array('4', $classes) ? 'selected' : '' }}>Four</option>
                        <option value="5" {{ in_array('5', $classes) ? 'selected' : '' }}>Five</option>
                        <option value="6" {{ in_array('6', $classes) ? 'selected' : '' }}>Six</option>
                        <option value="7" {{ in_array('7', $classes) ? 'selected' : '' }}>Seven</option>
                        <option value="8" {{ in_array('8', $classes) ? 'selected' : '' }}>Eight</option>
                        <option value="9" {{ in_array('9', $classes) ? 'selected' : '' }}>Nine</option>
                        <option value="10" {{ in_array('10', $classes) ? 'selected' : '' }}>Ten</option>
                    </select>
                    @error('name')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="input_group_wrapper" style="z-index: 0; position: relative;">
                @php
                    $i = 1;
                @endphp
                @foreach (json_decode($account->expenses, true) as $expense => $cost)
                    <div class="input_group" style="grid-gap: 1rem">
                        <div class="input_field">
                            <input type="text" id="key{{$i}}" name="key{{$i}}" placeholder="Expance name" value="{{$expense}}" required>
                        </div>
                        <div class="input_field">
                            <input type="number" id="value{{$i}}" name="value{{$i}}" placeholder="Cost" onkeyup="totalCost()" value="{{$cost}}" required>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
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
                    <input type="number" id="total_cost" name="total" placeholder="Total cost" value="{{ $account->total }}" required>
                    <input type="hidden" id="number_of_key_value_pairs" name="number_of_key_value_pairs">
                </div>
            </div>
            <div class="text-center mt-1">
                <button type="submit" class="button-primary" style="padding-block: 11px;"><i class="fa-regular fa-pen-to-square"></i> &nbsp; Update</button>
            </div>
        </form>
    </div>
</div>