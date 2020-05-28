@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Contents</h1>
	<a href="{{ URL::to('/contents/create') }}">{{ Form::button('Create', array('class' => ''))}}</a>
	@foreach($contents as $content)
		<p><a href="{{ URL::to('/contents/' . $content->content_id) }}">{{ $content->content_id }}</a></p>
		<p>{{ $content->content_title }}</p>
		<p>{{ $content->content_subtitle }}</p>
		<p>{{ $content->content_description }}</p>
		<p>{{ $content->content_anchor }}</p>
		<p>{{ $content->content_button }}</p>
		<p>{{ $content->content_buttonAnchor }}</p>
		<p>{{ $content->content_position }}</p>
		<p>{{ $content->content_background }}</p>
		<p>{{ $content->content_type }}</p>
		<p>{{ Form::open(array('url' => 'contents/' . $content->content_id, 'class' => '')) }}
	@endforeach
@endsection