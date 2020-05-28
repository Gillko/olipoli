@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $navigation->navigation_title }}</h1>
	{{ Form::model($navigation, ['method' => 'PUT', 'action' => ['NavigationController@update', $navigation->navigation_id]]) }}
		{{ Form::label('navigation_title', 'Title')}}
		{{ Form::text('navigation_title', null, ['class' => 'form-control']) }}
		{{ Form::label('navigation_description', 'Description')}}
		{{ Form::textarea('navigation_description', null, ['class' => 'form-control']) }}

		{{ Form::submit('Edit the Navigation!', array('class' => '')) }}
	{{ Form::close() }}
@endsection