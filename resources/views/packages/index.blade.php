@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Packages</h1>
	<a href="{{ URL::to('/packages/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($packages as $package)
		<p><a href="{{ URL::to('/packages/' . $package->package_id) }}">{{ $package->package_id }}</a></p>
		<p>{{ $package->package_name }}</p>
		<p>{{ $package->package_description }}</p>
		<p>{{ $package->package_conditions }}</p>
		<p>{{ $package->package_price }}</p>
		@unless ($package->types->isEmpty())
			<p>Types:</p>
			@foreach ($package->types as $type)
				<p><a href="{{ URL::to('/types/' . $type->type_id) }}">{{ $type->type_name }}</a></p>
			@endforeach
		@endunless
		@unless ($package->items->isEmpty())
			<p>Items:</p>
			@foreach ($package->items as $item)
				<p><a href="{{ URL::to('/items/' . $item->item_id) }}">{{ $item->item_description }}</a></p>
			@endforeach
		@endunless
		<p>{{ Form::open(array('url' => 'packages/' . $package->package_id, 'class' => '')) }}
	@endforeach
@endsection