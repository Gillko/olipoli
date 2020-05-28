@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Login</h1>
	<form data-abide role="" method="POST" action="{{ url('/login') }}">
		{!! csrf_field() !!}
		<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
			<label>E-Mail Address</label>
			<input type="email" name="email" value="{{ old('email') }}" class="form-control">
			@if ($errors->has('email'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('email') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
			<label class="">Password</label>
			<input type="password" name="password" class="form-control">
			@if ($errors->has('password'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('password') }}</p>
				</div>
			@endif
		</div>

		<input type="checkbox" name="remember">
		<label>Remember Me</label>
		<br/>
		<button type="submit" class="button expanded">Login</button>
		<a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
	</form>
@endsection