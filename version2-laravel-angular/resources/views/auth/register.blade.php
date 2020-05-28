@extends('layouts.layoutBackoffice')
@section('head')
<script src="{{ url('assets/js/libraries/jquery/jquery3.1.1.min.js') }}"></script>
<script>
	$(document).ready(function(){
	    $(".fullname").focus(function(){
	    	var fullname = $('input[name=user_firstname]').val() + ' ' + $('input[name=user_surname]').val();
	        $('input[name=user_fullname]').val(fullname);
	    });
	});
</script>
@endsection
@section('content')
	<h1>Register</h1>
	<form data-abide role="form" method="POST" action="{{ url('/register') }}">
		{!! csrf_field() !!}
		<div class="{{ $errors->has('user_firstname') ? ' has-error' : '' }}">
			<label>Firstname</label>
			<input type="text" name="user_firstname" value="{{ old('name') }}" class="form-control">
			@if ($errors->has('user_firstname'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('user_firstname') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('user_surname') ? ' has-error' : '' }}">
			<label>Surname</label>
			<input type="text" name="user_surname" value="{{ old('name') }}" class="form-control">
			@if ($errors->has('user_surname'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('user_surname') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('user_fullname') ? ' has-error' : '' }}">
			<label>Full Name</label>
			<input type="text" name="user_fullname" value="{{ old('name') }}" class="form-control fullname">
			@if ($errors->has('user_fullname'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('user_fullname') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('user_username') ? ' has-error' : '' }}">
			<label>Username</label>
			<input type="text" name="user_username" value="{{ old('name') }}" class="form-control">
			@if ($errors->has('user_username'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('user_username') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
			<label class="">E-Mail Address</label>
			<input type="email" name="email" value="{{ old('email') }}" class="form-control">
			@if ($errors->has('email'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('email') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
			<label>Password</label>
			<input type="password" name="password" class="form-control">

			@if ($errors->has('password'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('password') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			<label>Confirm Password</label>
			<input type="password" name="password_confirmation" class="form-control">
			@if ($errors->has('password_confirmation'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('password_confirmation') }}</p>
				</div>
			@endif
		</div>
		<br/>
		<button type="submit" class="button expanded">Register</button>
	</form>
@endsection