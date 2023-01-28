@props(['doctors','sections'])
<form class="data_form" action="{{ route("admin.departments.update") }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="input_group" style="grid-gap: 1rem">
        <div class="input_field">
            <input class="m-0" type="text" id="name" name="name" value="" placeholder="Marks" required>
            @error('name')
                <p class="input_error">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn" style="padding-block: 11px;"><i class="fa-regular fa-pen-to-square"></i> Update</button>
    </div>

    <h1 class="form_title pb-2">Update Section</h1>

    <button type="submit" class="btn btn-lg mt-2"><i class="fa-light fa-floppy-disk"></i> Save</button>
</form>