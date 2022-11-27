@props(['title','input_type','input_name'])
<div class="login_box">
    <div class="login_title">
        <img src="{{ asset('/backend/img/logo.png') }}" alt="">
        <h2>{{ ucfirst($title) }} Login</h2>
    </div>
    <form method="POST" action="{{ $title == 'student'? route('login') : route($title.'.login') }}">
        @csrf
        <div class="input_single">
            <label class="input_title animate_label" for="email">Email or number</label>
            <input name="{{ $input_name??'email' }}" type="{{ $input_type ?? 'email' }}" class="input animate_input" value="{{ old('email') }}" onload="alert('loaded')" onfocus="inputFocusAnimation(this)" onblur="inputBlurAnimation(this)" required/>
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
        <div class="form_links">
            <a class="form_link" href="{{ $title == 'student'? route('login') : route($title.'.login') }}">Register!</a>
            <a class="form_link" href="{{ $title == 'student'? route('login') : route($title.'.login') }}">Forgot password?</a>
        </div>                      
        <input class="btn_submit" type="submit">                   
    </form>
</div>