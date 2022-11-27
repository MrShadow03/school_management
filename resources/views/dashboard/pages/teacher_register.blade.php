@section('title')
<title>Teacher Register</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')
<div class="right_content">
    <x-dashboard.organisms.register title="stuff"/>
</div>
@endsection

@section('exclusive_scripts')
<script>
    defaultInputAnimation();
</script>
@endsection