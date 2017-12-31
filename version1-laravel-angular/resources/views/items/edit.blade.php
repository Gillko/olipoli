@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $item->item_description }}</h1>
	{{ Form::model($item, ['method' => 'PUT', 'action' => ['ItemController@update', $item->item_id]]) }}
		{{ Form::label('type_id', 'Types')}}
		{{ Form::select('type_id', $types, null, ['class' => 'form-control']) }}
		{{ Form::label('package_list', 'Packages')}}
		{{ Form::select('package_list[]', $packages, null, ['multiple', 'class' => 'form-control']) }}
		{{ Form::label('item_description', 'Description')}}
		{{ Form::text('item_description', null, ['class' => 'form-control']) }}
		
		{{ Form::submit('Edit the Item!', array('class' => '')) }}
	{{ Form::close() }}
@endsection