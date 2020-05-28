@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $item->item_id }}</h1>
	<a href="{{ URL::to('/items/' . $item->item_id) }}">{{ $item->item_id }}</a>
	<p>{{ $item->item_description }}</p>
	
	<p>Type:</p>
	<p>{{ $item->type->type_name }}</p>
	@unless ($item->packages->isEmpty())
		<p>Packages:</p>
		@foreach ($item->packages as $package)
			<p><a href="{{ URL::to('/packages/' . $package->package_id) }}">{{ $package->package_name }}</a></p>
		@endforeach
	@endunless
	<a href="{{ URL::to('/items/' . $item->item_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'items/' . $item->item_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection