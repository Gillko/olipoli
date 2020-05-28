@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Pictures</h1>
	<a href="{{ URL::to('/pictures/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($pictures as $picture)
		<p><a href="{{ URL::to('/pictures/' . $picture->picture_id) }}">{{ $picture->picture_id }}</a></p>
		<p>{{ $picture->picture_title }}</p>
		<p>{{ $picture->picture_description }}</p>
		<p>{{ $picture->picture_alt }}</p>
		<p>{{ $picture->picture_url }}</p>
		<p>{{ $picture->picture_type }}</p>
		@unless ($picture->content != 'NULL')
			<p>Content:</p>
			<p>{{ $picture->content->content_title }}</p>
		@endunless
	@endforeach
@endsection