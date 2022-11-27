@section('title')
<title>Stuff Login</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')
<div class="right_content">
    <x-dashboard.organisms.login title="stuff" input_name="email" input_type="email"/>     
</div>
@endsection

@section('exclusive_scripts')
<script>
    defaultInputAnimation();
</script>
@endsection