@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $type->type_name }}</h1>
	<a href="{{ URL::to('/types/' . $type->type_id) }}">{{ $type->type_id }}</a>
	<p>{{ $type->type_name }}</p>
	<p>{{ $type->type_description }}</p>

	@unless ($type->items->isEmpty())
		<p>Items:</p>
		@foreach ($type->items as $item)
			<p><a href="{{ URL::to('/items/' . $item->item_id) }}">{{ $item->item_description }}</a></p>
		@endforeach
	@endunless
	@unless ($type->packages->isEmpty())
		<p>Packages:</p>
		@foreach ($type->packages as $package)
			<p><a href="{{ URL::to('/packages/' . $package->package_id) }}">{{ $package->package_name }}</a></p>
		@endforeach
	@endunless
	<a href="{{ URL::to('/types/' . $type->type_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'types/' . $type->type_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection