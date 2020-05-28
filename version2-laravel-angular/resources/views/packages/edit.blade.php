@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $package->package_name }}</h1>
	{{ Form::model($package, ['method' => 'PUT', 'action' => ['PackageController@update', $package->package_id]]) }}

		{{ Form::label('types', 'Type')}}
		{{ Form::select('type_list[]', $types, null, ['multiple', 'class' => 'form-control']) }}
		{{ Form::label('items', 'Item')}}
		{{ Form::select('item_list[]', $items, null, ['multiple', 'class' => 'form-control']) }}
		{{ Form::label('package_name', 'Name')}}
		{{ Form::text('package_name', null, ['class' => 'form-control']) }}
		{{ Form::label('package_description', 'Description')}}
		{{ Form::text('package_description', null, ['class' => 'form-control']) }}
		{{ Form::label('package_conditions', 'Conditions')}}
		{{ Form::text('package_conditions', null, ['class' => 'form-control']) }}
		{{ Form::label('package_price', 'Price')}}
		{{ Form::text('package_price', null, ['class' => 'form-control']) }}
	
		{{ Form::submit('Edit the Package!', ['class' => '']) }}
	{{ Form::close() }}
@endsection