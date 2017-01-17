@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>{{ $role->role_title }}</h1>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<p>{{ $role->role_id }}</p>
					<p>{{ $role->role_title }}</p>
					{!! html_entity_decode($role->role_description) !!}
					<p>{{ $role->role_created }}</p>
					<p>{{ $role->role_modified }}</p>
					@unless ($role->users->isEmpty())
						<p>Users:</p>
						@foreach ($role->users as $user)
							<p><a href="{{ URL::to('/users/show/' . $user->user_id) }}">{{ $user->user_username }}</a></p>
						@endforeach
					@endunless
					<a href="{{ URL::to('/roles/' . $role->role_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
					{{ Form::open(array('url' => 'categories/' . $role->role_id, 'class' => '')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Delete', array('type' => 'submit', 'class' => 'button alert'))}}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection