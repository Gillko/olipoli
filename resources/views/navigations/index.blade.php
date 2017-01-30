@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Navigations</h1>
	<a href="{{ URL::to('/navigations/create') }}">{{ Form::button('Create', array('class' => ''))}}</a>
	@foreach($navigations as $navigation)
	{{-- @foreach($allModelRecords as $navigation) --}}
		<p><a href="{{ URL::to('/navigations/' . $navigation->navigation_id) }}">{{ $navigation->navigation_id }}</a></p>
		<p>{{ $navigation->navigation_title }}</p>
		<p>{{ $navigation->navigation_description }}</p>
		<p>{{ Form::open(array('url' => 'navigations/' . $navigation->navigation_id, 'class' => '')) }}
	@endforeach
@endsection