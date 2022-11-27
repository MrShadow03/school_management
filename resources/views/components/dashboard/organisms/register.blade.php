@props(['title'])
<div class="login_box">
    <div class="login_title">
        <img src="{{ asset('/backend/img/logo.png') }}" alt="">
        <h2>{{ ucfirst($title) }} Register</h2>
    </div>
    <form method="POST" action="{{ route($title.'.register') }}">
        @csrf
        <div class="input_single">
            <label class="input_title animate_label" for="name">Name</label>
            <input name="name" type="text" class="input animate_input" value="{{ old('name') }}" onfocus="inputFocusAnimation(this)" onblur="inputBlurAnimation(this)" required/>
            @error('name')
            <p class="input_error">{{ $message }}</p>
            @enderror
        </div>
        <div class="input_single">
            <label class="input_title animate_label" for="email">Email or number</label>
            <input name="email" type="email" class="input animate_input" value="{{ old('email') }}" onfocus="inputFocusAnimation(this)" onblur="inputBlurAnimation(this)" required/>
            @error('email')
            <p class="input_error">{{ $message }}</p>
            @enderror
        </div>
        <div class="input_single">
            <label class="input_title animate_label" for="password">Password</label>
            <input id="password" name="password" type="password" class="input animate_input" onfocus="inputFocusAnimation(this)" onblur="inputBlurAnimation(this)" required/>
            @error('password')
            <p class="input_error">{{ $message }}</p>
            @enderror
        </div>
        <div class="input_single">
            <label class="input_title animate_label" for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="input animate_input" onfocus="inputFocusAnimation(this)" onblur="inputBlurAnimation(this)" required/>
            @error('password_confirmation')
            <p class="input_error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form_links">
            <a class="form_link" href="{{ route($title.'.login') }}">Login!</a>
        </div>                      
        <input class="btn_submit" type="submit">                   
    </form>
</div>