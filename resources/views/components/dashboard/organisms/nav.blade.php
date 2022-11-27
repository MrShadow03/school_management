@props(['search','username','logout_route'])
<div class="top_head">
    <div class="bars hamburger hamburger--arrowturn-r">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    @if (isset($search))
        <div class="search"><input class="search_input" type="text"><i class="las la-search"></i></div>
    @endif
    <div class="social_link">
        <div class="message"><i class="lar la-envelope-open"></i></div>
        <div class="profile">
            @if (Auth::guard('student')->check())
                <img src="{{asset('storage')}}/{{Auth::guard('student')->user()->student_image}}" alt="img">
            @else
                <img src="{{ asset('backend/img/curd.png') }}" alt="">
            @endif
            <p>{{ $username }} <i class="las la-angle-down"></i></p>
            <div class="profile_area">
                    <span></span>
                <div class="img_area">
                    <img src="{{ asset('backend/img/curd.png') }}" alt="">
                    <div class="img_text">
                        <p>Abid Hasan Miraz</p>
                        <p>miraz18917@yahoo.com</p>
                    </div>
                </div>
                <div class="profile_sub_item">
                    <i class="las la-envelope"></i>
                    <a href="#">Inbox</a>
                </div>
                <div class="profile_sub_item">
                    <i class="lar la-user-circle"></i>
                    <a href="#">Account</a>
                </div>
                <div class="profile_sub_item">
                    <i class="las la-cog"></i>
                    <a href="#">Setting</a>
                </div>
                <form method="POST" action="{{ route($logout_route) }}" class="profile_sub_item">
                    @csrf
                    <i class="las la-sign-in-alt"></i>
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" >Logout</a>
                </form>
            </div>
        </div>
    </div>                
</div>