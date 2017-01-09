@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $type->type_name }}</h1>
	{{ Form::model($type, ['method' => 'PUT', 'action' => ['TypeController@update', $type->type_id]]) }}
		{{ Form::label('type_name', 'Name')}}
		{{ Form::text('type_name', null, ['class' => 'form-control']) }}
		{{ Form::label('type_description', 'Description')}}
		{{ Form::text('type_description', null, ['class' => 'form-control']) }}
		{{ Form::label('items', 'Item')}}
		{{ Form::select('item_list[]', $items, null, ['multiple', 'class' => 'form-control']) }}
		{{ Form::label('packages', 'Package')}}
		{{ Form::select('package_list[]', $packages, null, ['multiple', 'class' => 'form-control']) }}
		

		{{ Form::submit('Edit the Type!', array('class' => '')) }}
	{{ Form::close() }}
@endsection