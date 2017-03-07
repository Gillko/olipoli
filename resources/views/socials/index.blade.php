@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Social links</h1>
	<a href="{{ URL::to('/socials/create') }}">{{ Form::button('Create', array('class' => ''))}}</a>
	@foreach($socials as $social)
	{{-- @foreach($allModelRecords as $social) --}}
		<p><a href="{{ URL::to('/socials/' . $social->social_id) }}">{{ $social->social_id }}</a></p>
		<p>{{ $social->social_fontawesome }}</p>
		<p>{{ $social->social_link }}</p>
		@unless ($social->content != 'NULL')
			<p>Content:</p>
			<p>{{ $social->content->content_title }}</p>
		@endunless
		<p>{{ Form::open(array('url' => 'socials/' . $social->social_id, 'class' => '')) }}
	@endforeach
@endsection