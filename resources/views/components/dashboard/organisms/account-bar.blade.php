@props(['route', 'inner_text'])
<div class="bar-wrapper">
    <ul class="class-list bar">
        <li class="bar-item button-31" id="class-3" ><a href="{{ route($route) }}">{!! $inner_text !!}</a></li>
    </ul>
</div>