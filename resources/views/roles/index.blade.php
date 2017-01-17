@extends('layouts.layout')
@section('content')
	<div class="container-gv">
		<div class="content-gv">
			<div class="row">
				<div class="large-3 large-centered column title-gv color-blue-gv">
					<h1>roles</h1>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<a href="{{ URL::to('/roles/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
					@foreach($roles as $role)
						<p><a href="{{ URL::to('/roles/' . $role->role_id) }}">{{ $role->role_id }}</a></p>
						<p>{{ $role->role_title }}</p>
						<p>{!! html_entity_decode($role->role_description) !!}</p>
						<p>{{ $role->role_created }}</p>
						<p>{{ $role->role_modified }}</p>
						<p>{{ Form::open(array('url' => 'roles/' . $role->role_id, 'class' => '')) }}
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection