@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>create a role</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::open(array('url' => 'roles')) }}
						{{ Form::label('role_title', 'Title')}}
						{{ Form::text('role_title') }}
						{{ Form::label('role_description', 'Description')}}
						{{ Form::textarea('role_description') }}
						{{ Form::label('role_created', 'Created')}}
						{{ Form::datetime('role_created', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('users', 'Users')}}
						{{ Form::select('users[]', $users, null, ['multiple']) }}

						{{ Form::submit('Create the Role!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection