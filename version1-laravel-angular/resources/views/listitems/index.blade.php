@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Listitems</h1>
	<a href="{{ URL::to('/listitems/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($listitems as $listitem)
		<p><a href="{{ URL::to('/listitems/' . $listitem->listitem_id) }}">{{ $listitem->listitem_id }}</a></p>
		<p>{{ $listitem->listitem_title }}</p>
		<p>{{ $listitem->listitem_description }}</p>
		<p>{{ $listitem->listitem_anchor }}</p>
		<p>{{ $listitem->listitem_position }}</p>
		<p>Navigation:</p>
		<p>{{ $listitem->navigation->navigation_title }}</p>
	@endforeach
@endsection