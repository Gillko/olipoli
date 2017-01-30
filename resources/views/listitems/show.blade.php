@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $listitem->listitem_id }}</h1>
	<a href="{{ URL::to('/listitems/' . $listitem->listitem_id) }}">{{ $listitem->listitem_id }}</a>
	<p>{{ $listitem->listitem_title }}</p>
	<p>{{ $listitem->listitem_description }}</p>
	<p>{{ $listitem->listitem_anchor }}</p>
	
	<p>Navigation:</p>
	<p>{{ $listitem->navigation->navigation_title }}</p>
	<a href="{{ URL::to('/listitems/' . $listitem->listitem_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'listitems/' . $listitem->listitem_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection