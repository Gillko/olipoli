@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $picture->picture_title }}</h1>
	<p>{{ $picture->picture_description }}</p>
	<p>{{ $picture->picture_alt }}</p>
	<p>{{ $picture->picture_url }}</p>
	
	@unless ($picture->content != 'NULL')
		<p>Content:</p>
		<p>{{ $picture->content->content_title }}</p>
	@endunless
	<a href="{{ URL::to('/pictures/' . $picture->picture_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'pictures/' . $picture->picture_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection