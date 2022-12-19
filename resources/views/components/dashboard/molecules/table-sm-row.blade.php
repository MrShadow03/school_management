@props(['w','sections'])
@php
    $i = 1;
@endphp
<tbody>
    @foreach ($sections as $section)
    <tr class="body-row">
        <td class="body-column text-body-column">{{ $i }}</td>
        <td class="body-column text-body-column">{{ $section->name }}</td>
        <td class="body-column text-body-column">{{ $section->class }}</td>
        <td class="body-column text-body-column">{{ $section->teacher->name ?? '' }}</td>
        <input type="hidden" name="id" value="{{ $section->id }}">
        <td class="body-column text-body-column"><a href="#" onclick="dataToForm(this)">Edit</a></td>
    </tr>
    @php
        $i++;
    @endphp
    @endforeach
</tbody>