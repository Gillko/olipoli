@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Reset Password</h1>
	<form data-abide role="form" method="POST" action="{{ url('/password/reset') }}">
		{!! csrf_field() !!}
		<input type="hidden" name="token" value="{{ $token }}">
		<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
			<label>E-Mail Address</label>
			<input type="email" name="email" value="{{ $email or old('email') }}">
			@if ($errors->has('email'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('email') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
			<label>Password</label>
			<input type="password" name="password">

			@if ($errors->has('password'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('password') }}</p>
				</div>
			@endif
		</div>
		<div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			<label>Confirm Password</label>
			<input type="password" name="password_confirmation">

			@if ($errors->has('password_confirmation'))
				<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>{{ $errors->first('password_confirmation') }}</p>
				</div>
			@endif
		</div>
		<button type="submit" class="button expanded">Reset Password</button>
	</form>
@endsection