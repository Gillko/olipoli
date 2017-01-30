@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $content->content_title }}</h1>
	{{ Form::model($content, ['method' => 'PUT', 'action' => ['ContentController@update', $content->content_id]]) }}
		{{ Form::label('content_title', 'Title')}}
		{{ Form::text('content_title', null, ['class' => 'form-control']) }}
		{{ Form::label('content_subtitle', 'Sub Title')}}
		{{ Form::text('content_subtitle', null, ['class' => 'form-control']) }}
		{{ Form::label('content_description', 'Description')}}
		{{ Form::textarea('content_description', null, ['class' => 'form-control']) }}
		{{ Form::label('content_anchor', 'Anchor')}}
		{{ Form::text('content_anchor', null, ['class' => 'form-control']) }}
		{{ Form::label('content_button', 'Button')}}
		{{ Form::text('content_button', null, ['class' => 'form-control']) }}

		{{ Form::submit('Edit the Content block!', array('class' => '')) }}
	{{ Form::close() }}
@endsection