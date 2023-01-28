@props(['guard'])
<div class="left_nevbar">
    <div class="side_bar">
        <x-dashboard.molecules.sidebar_header />

        {{-- sidebar menu starts here --}}
            <x-dashboard.molecules.sidebar_menu>
                {{-- sidebar for students --}}
                @if (Auth::guard('student')->check())
                <li><a href="index.html"><i class="menu_icon fa-light fa-user"></i>Appointments</a></li>
                <li><a href="{{ route('student.routine') }}"><i class="menu_icon fa-light fa-calendar-days"></i>Routine</a></li>
                <li><a href="{{ route('student.result') }}"><i class="menu_icon fa-light fa-bell"></i>Results</a></li>
                <li><a href="index.html"><i class="menu_icon fa-light fa-user-graduate"></i>Teachers</a></li>
                <li><a class="toggle_btn" href="#"><i class="las menu_icon la-cog"></i>Setting<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="profile.html"><i class="las la-arrow-right"></i>Profile</a></li>
                    </ul>
                </li>
                @elseif (Auth::guard('admin')->check())
                {{-- sidebar for admin --}}
                <li><a href="{{ route('admin.dashboard') }}"><i class="menu_icon fa-regular fa-calendar-check"></i>Appoinments</a></li>
                <li><a href="{{ route('admin.departments.index') }}"><i class="menu_icon fa-regular fa-layer-group"></i>Departments</a></li>
                <li><a href="{{ route('admin.doctors.index') }}"><i class="menu_icon fa-regular fa-stethoscope"></i>Doctors</a></li>
                {{-- <li><a href="{{ route('admin.assistants.index') }}"><i class="menu_icon fa-regular fa-house-user"></i>Assistants</a></li> --}}
                
                @endif
            </x-dashboard.molecules.sidebar_menu>
        <x-dashboard.molecules.sidebar_footer />
    </div>
</div>