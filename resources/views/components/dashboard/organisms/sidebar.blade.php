@props(['guard'])
<div class="left_nevbar">
    <div class="side_bar">
        <x-dashboard.molecules.sidebar_header />

        {{-- sidebar menu starts here --}}
            <x-dashboard.molecules.sidebar_menu>
                {{-- sidebar for students --}}
                @if (Auth::guard('student')->check())
                <li><a href="index.html"><i class="menu_icon fa-solid fa-user"></i>Dashboard</a></li>
                <li><a href="{{ route('routine') }}"><i class="menu_icon fa-regular fa-calendar-days"></i>Routine</a></li>
                <li><a href="index.html"><i class="menu_icon fa-solid fa-bell"></i>Notice</a></li>
                <li><a href="index.html"><i class="menu_icon fa-solid fa-users"></i>Teachers</a></li>
                <li><a class="toggle_btn" href="#"><i class="las menu_icon la-cog"></i>Setting<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="profile.html"><i class="las la-arrow-right"></i>Profile</a></li>
                    </ul>
                </li>
                @elseif (Auth::guard('admin')->check())
                {{-- sidebar for admin --}}
                <li><a href="{{ route('admin.dashboard') }}"><i class="menu_icon fa-regular fa-house-user"></i>Dashboard</a></li>
                <li><a class="toggle_btn" href="#"><i class="fa-regular fa-chalkboard-user menu_icon"></i>Manage Teacher<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="{{ route('admin.register-teacher.create') }}"><i class="fa-regular fa-users"></i> Teachers</a></li>
                        <li><a href="{{ route('admin.register-teacher.create') }}"><i class="fa-regular fa-user-plus"></i> Register Teacher</a></li>
                    </ul>
                </li>
                <li><a class="toggle_btn" href="#"><i class="fa-regular fa-graduation-cap menu_icon"></i>Manage Student<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="{{ route('admin.students') }}"><i class="fa-regular fa-users"></i> All Students</a></li>
                        <li><a href="{{ route('admin.register-student.create') }}"><i class="fa-regular fa-user-plus"></i> Student Register</a></li>
                    </ul>
                </li>
                <li><a class="toggle_btn" href="#"><i class="fa-regular fa-layer-group menu_icon"></i>Class & Sections<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="{{ route('admin.section.index') }}"><i class="fa-regular fa-layer-plus"></i>Sections</a></li>
                    </ul>
                </li>
                <li><a class="toggle_btn" href="#"><i class="fa-light fa-book menu_icon"></i>Subjects<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="{{ route('admin.subject.index') }}"><i class="fa-light fa-books-medical"></i>Create Subject</a></li>
                        <li><a href="{{ route('admin.assign-subject-teacher') }}"><i class="fa-regular fa-user-plus"></i> Assign Teacher</a></li>
                    </ul>
                </li>
                <li><a class="toggle_btn" href="#"><i class="fa-regular fa-calendar-days menu_icon"></i>Routines<i class="las sub_icon la-angle-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="{{ route('admin.routine.index') }}"><i class="fa-regular fa-calendars"></i></i>View Routines</a></li>
                        <li><a href="{{ route('admin.routine') }}"><i class="fa-regular fa-calendar-plus"></i></i> Create Routines</a></li>
                    </ul>
                </li>
                @elseif (Auth::guard('teacher')->check())
                {{-- sidebar for teacher --}}
                <li><a href="{{ route('teacher.dashboard') }}"><i class="menu_icon fa-light fa-house-user"></i>Dashboard</a></li>
                <li><a href="{{ route('teacher.students',auth()->user()->id) }}"><i class="menu_icon fa-light fa-graduation-cap"></i>My Students</a></li>
                <li><a href="{{ route('teacher.routine') }}"><i class="menu_icon fa-light fa-graduation-cap"></i>My Routines</a></li>
                <li><a href="{{ route('teacher.attendance.create') }}"><i class="menu_icon fa-light fa-graduation-cap"></i>Attendance</a></li>
                @endif
            </x-dashboard.molecules.sidebar_menu>
        <x-dashboard.molecules.sidebar_footer />
    </div>
</div>