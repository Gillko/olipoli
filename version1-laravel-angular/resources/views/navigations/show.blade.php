@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $navigation->navigation_title }}</h1>
	<a href="{{ URL::to('/navigations/' . $navigation->navigation_id) }}">{{ $navigation->navigation_id }}</a>
	<p>{{ $navigation->navigation_title }}</p>
	<p>{{ $navigation->navigation_description }}</p>

	<a href="{{ URL::to('/navigations/' . $navigation->navigation_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'navigations/' . $navigation->navigation_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection