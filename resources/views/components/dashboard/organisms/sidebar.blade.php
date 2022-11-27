@props(['guard'])
<div class="left_nevbar">
    <div class="side_bar">
        <x-dashboard.molecules.sidebar_header />

        {{-- sidebar menu starts here --}}
            <x-dashboard.molecules.sidebar_menu>
                {{-- sidebar for students --}}
                @if (Auth::guard('student')->check())
                <li><a href="index.html"><i class="menu_icon fa-solid fa-user"></i>Dashboard</a></li>
                <li><a href="index.html"><i class="menu_icon fa-solid fa-list-dropdown"></i>Routine</a></li>
                <li><a href="index.html"><i class="menu_icon fa-solid fa-bell"></i>Notice</a></li>
                <li><a href="index.html"><i class="menu_icon fa-solid fa-users"></i>Teachers</a></li>
                <li><a class="toggle_btn" href="#"><i class="las menu_icon la-cog"></i>Setting<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="profile.html"><i class="las la-arrow-right"></i>Profile</a></li>
                    </ul>
                </li>
                @elseif (Auth::guard('admin')->check())
                {{-- sidebar for admin --}}
                <li><a href="index.html"><i class="menu_icon fa-regular fa-house-user"></i>Dashboard</a></li>
                    <li><a class="toggle_btn" href="#"><i class="fa-regular fa-graduation-cap menu_icon"></i>Manage Student<i class="las sub_icon la-angle-down"></i></a>
                        <ul class="sub_menu">
                            <li><a href="{{ route('admin.register-student.create') }}"><i class="fa-regular fa-users"></i> All Students</a></li>
                            <li><a href="{{ route('admin.register-student.create') }}"><i class="fa-regular fa-user-plus"></i> Student Register</a></li>
                        </ul>
                    </li>
                @endif
            </x-dashboard.molecules.sidebar_menu>                           <!--START FOOTER HERE -->
        <x-dashboard.molecules.sidebar_footer />
    </div>
</div>