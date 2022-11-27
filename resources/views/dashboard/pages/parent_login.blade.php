@section('title')
<title>Parent Login</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')
<div class="right_content">
    <x-dashboard.organisms.login title="parent" input_name="phone_number" input_type="text"/>  
</div>
@endsection

@section('exclusive_scripts')
<script>
    defaultInputAnimation();
</script>
@endsection