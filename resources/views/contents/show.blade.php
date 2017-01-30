@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $content->content_title }}</h1>
	<a href="{{ URL::to('/contents/' . $content->content_id) }}">{{ $content->content_id }}</a>
	<p>{{ $content->content_title }}</p>
	<p>{{ $content->content_subtitle }}</p>
	<p>{{ $content->content_description }}</p>
	<p>{{ $content->content_anchor }}</p>
	<p>{{ $content->content_button }}</p>

	<a href="{{ URL::to('/contents/' . $content->content_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'contents/' . $content->content_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection