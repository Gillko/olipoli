@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $social->social_fontawesome }}</h1>
	<a href="{{ URL::to('/socials/' . $social->social_id) }}">{{ $social->social_id }}</a>
	<p>{{ $social->social_fontawesome }}</p>
	<p>{{ $social->social_link }}</p>

	<a href="{{ URL::to('/socials/' . $social->social_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'socials/' . $social->social_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection