@props(['sections','current_section', 'account'])
<div class="content_sidebar">
    <ul class="content_sidebar__list">
        @foreach ($sections->pluck('class') as $class)
            <li class="content_sidebar__item {{ $current_section->class == $class ? 'content_sidebar__item--active' : '' }}">
                <div class="content_sidebar__wrapper">
                    <a href="#" class="content_sidebar__link">Class {{ $class }}</a>
                    <i class="content_sidebar__icon fa-regular fa-angle-down"></i>
                </div>
                <ul class="content_sidebar__sublist" {!! $current_section->class == $class ? "style='display:block !important;'" : '' !!}>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($sections->where('class', $class) as $section)
                        <li class="content_sidebar__subitem {{ $current_section->id == $section->id ? 'content_sidebar__subitem--active' : '' }}">
                            <a href="{{ route('teacher.collect_payment.create', [$account->id, $section->id]) }}" class="content_sidebar__sublink">{{$i.'. '.$section->name }}</a>
                        </li>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>