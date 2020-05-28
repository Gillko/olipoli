@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Reset Password</h1>
	@if (session('status'))
		<div data-abide-error class="alert callout">
			<p><i class="fi-alert"></i>{{ session('status') }}</p>
		</div>
	@endif
	<form data-abide role="form" method="POST" action="{{ url('/password/email') }}">
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
		<br/>
		<button type="submit" class="button expanded">Send Password Reset Link</button>
	</form>
@endsection