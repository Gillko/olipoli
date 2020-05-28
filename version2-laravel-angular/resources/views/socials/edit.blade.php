@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $social->social_fontawesome }}</h1>
	{{ Form::model($social, ['method' => 'PUT', 'action' => ['SocialController@update', $social->social_id]]) }}
		{{ Form::label('social_fontawesome', 'Fontawesome')}}
		{{ Form::text('social_fontawesome', null, ['class' => 'form-control']) }}
		{{ Form::label('social_link', 'Link')}}
		{{ Form::textarea('social_link', null, ['class' => 'form-control']) }}

		{{ Form::submit('Edit the Social link!', array('class' => '')) }}
	{{ Form::close() }}
@endsection