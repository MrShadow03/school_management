@props(['search','username','logout_route'])
<div class="top_head print-none">
    <div class="bars hamburger hamburger--arrowturn-r">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    @if (isset($search))
        <div class="search print-none"><input class="search_input" type="text"><i class="las la-search"></i></div>
    @endif
    <div class="social_link print-none">
        <div class="message"><i class="fa-regular fa-bell"></i></div>
        <div class="profile">
            @if (Auth::guard('student')->check())
                <img class="profile_img" src="{{asset('storage')}}/{{Auth::guard('student')->user()->student_image}}" alt="img">
            @endif
            @if (Auth::guard('admin')->check())
                <img class="profile_img" src="{{asset('backend/img/default.webp')}}" alt="img">
            @endif
            <div class="profile_area">
                <div class="img_area">
                    @if (Auth::guard('student')->check())
                    <img src="{{asset('storage')}}/{{Auth::guard('student')->user()->student_image}}" alt="img">
                @endif
                @if (Auth::guard('admin')->check())
                    <img src="{{asset('backend/img/default.webp')}}" alt="img">
                @endif
                    <div class="img_text">
                        <p>{{Auth::user()->name }}</p>
                        <p>{{ Auth::user()->username }}</p>
                    </div>
                </div>
                <div class="profile_sub_item">
                    <i class="fa-regular fa-circle-user"></i>
                    <a href="#">Profile</a>
                </div>
                <div class="profile_sub_item">
                    <i class="fa-regular fa-bell"></i>
                    <a href="#">Notices</a>
                </div>
                <div class="profile_sub_item">
                    <i class="fa-regular fa-gear"></i>
                    <a href="#">Settings</a>
                </div>
                <form method="POST" action="{{ route($logout_route) }}" class="profile_sub_item" onclick="event.preventDefault(); this.closest('form').submit();">
                    @csrf
                    <i class="fa-regular fa-power-off"></i>
                    <a href="#" >Logout</a>
                </form>
            </div>
        </div>
    </div>                
</div>