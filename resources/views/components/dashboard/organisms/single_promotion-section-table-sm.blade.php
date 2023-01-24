@props(['sections','current_section','class'])
<div class="content_sidebar">
    <ul class="content_sidebar__list">
        @foreach ($sections->sortBy('class')->unique('class') as $section)
            <li class="content_sidebar__item {{ $class == $section->class ? 'content_sidebar__item--active' : '' }}">
                <div class="content_sidebar__wrapper">
                    <a href="#" class="content_sidebar__link">Class {{ $section->class }}</a>
                    <i class="content_sidebar__icon fa-regular fa-angle-down"></i>
                </div>
                <ul class="content_sidebar__sublist" {!! $class == $section->class ? "style='display:block !important;'" : '' !!}>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($sections->where('class',$section->class) as $section)
                        <li class="content_sidebar__subitem {{ $current_section->id == $section->id ? 'content_sidebar__subitem--active' : '' }}">
                            <a href="{{ route('admin.promotion.single.index', $section->id) }}" class="content_sidebar__sublink">{{$i.'. '.$section->name }}</a>
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