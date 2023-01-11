@props(['grades'])
<div class="table_box table-thin">
    <div class="table-wrapper">
        <h1 class="text-title pb-1 text-center">Grade Table</h1>
        <p class="fs-14 text-primary text-center pb-2 border-bottom">Session: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y') }}</p>
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
                @foreach ($grades as $grade)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $grade->name }}</td>
                    <td class="body-column text-body-column">{{ $grade->score }}</td>
                    <td class="body-column text-body-column">{{ $grade->comment }}</td>
                    <td class="body-column text-body-column">
                        <a href="#" class="btn btn-sm btn-primary" onclick="placeData(this.parentNode)">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="text-title pt-2 pb-1 mt-2 text-center border-top">Update Grade</h1>
        <form action="{{ route('admin.grade.update') }}" method="POST" class="filter-form">
            @method('PATCH')
            @csrf
            <div class="input_group" style="grid-gap: 1rem">
                <div class="input_field">
                    <select name="name" id="name" required>
                        <option value="" selected disabled>Select section</option>
                        @foreach($grades as $grade)
                            <option value="{{ $grade->name }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
                <div class="input_field">
                    <input class="m-0" type="number" id="score" name="score" value="" placeholder="Marks" required>
                    @error('score')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
                <div class="input_field">
                    <input class="m-0" type="text" id="comment" name="comment" value="" placeholder="Comment" required>
                    @error('comment')
                        <p class="input_error">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn" style="padding-block: 11px;"><i class="fa-regular fa-pen-to-square"></i> Update</button>
            </div>
        </form>
    </div>
</div>