@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Items</h1>
	<a href="{{ URL::to('/items/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($items as $item)
		<p><a href="{{ URL::to('/items/' . $item->item_id) }}">{{ $item->item_id }}</a></p>
		<p>{{ $item->item_description }}</p>
		<p>Type:</p>
		<p>{{ $item->type->type_name }}</p>
		@unless ($item->packages->isEmpty())
			<p>Packages:</p>
			@foreach ($item->packages as $package)
				<p><a href="{{ URL::to('/packages/' . $package->package_id) }}">{{ $package->package_name }}</a></p>
			@endforeach
		@endunless
		<p>{{ Form::open(array('url' => 'items/' . $item->item_id, 'class' => '')) }}
	@endforeach
@endsection