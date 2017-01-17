@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-5 large-centered column title-gv color-blue-gv">
					<h1>edit {{ $role->role_title }}</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					{{ Form::model($role, ['method' => 'PATCH', 'action' => ['RolesController@update', $role->role_id]]) }}
						{{ Form::label('role_title', 'Title')}}
						{{ Form::text('role_title') }}
						{{ Form::label('role_description', 'Description')}}
						{{ Form::textarea('role_description') }}
						{{ Form::label('role_modified', 'Modified')}}
						{{ Form::datetime('role_modified', Carbon\Carbon::now()->format('Y-m-d H:m:s')) }}
						{{ Form::label('user_list', 'Users')}}
						{{ Form::select('user_list[]', $users, null, ['multiple']) }}

						{{ Form::submit('Edit the Role!', array('class' => 'button expanded')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection