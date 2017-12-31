@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $listitem->listitem_title }}</h1>
	{{ Form::model($listitem, ['method' => 'PUT', 'action' => ['ListitemController@update', $listitem->listitem_id]]) }}
		{{ Form::label('navigation_id', 'Navigations')}}
		{{ Form::select('navigation_id', $navigations, null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_title', 'Title')}}
		{{ Form::text('listitem_title', null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_description', 'Description')}}
		{{ Form::text('listitem_description', null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_anchor', 'Anchor')}}
		{{ Form::text('listitem_anchor', null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_position', 'Position')}}
		{{ Form::text('listitem_position', null, ['class' => 'form-control']) }}
		
		{{ Form::submit('Edit the Listitem!', array('class' => '')) }}
	{{ Form::close() }}
@endsection