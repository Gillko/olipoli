@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Types</h1>
	<a href="{{ URL::to('/types/create') }}">{{ Form::button('Create', array('class' => ''))}}</a>
	@foreach($types as $type)
		<p><a href="{{ URL::to('/types/' . $type->type_id) }}">{{ $type->type_id }}</a></p>
		<p>{{ $type->type_name }}</p>
		<p>{{ $type->type_description }}</p>
		@unless ($type->packages->isEmpty())
			<p>Packages:</p>
			@foreach ($type->packages as $package)
				<p><a href="{{ URL::to('/packages/' . $package->package_id) }}">{{ $package->package_name }}</a></p>
			@endforeach
		@endunless
		<p>{{ Form::open(array('url' => 'types/' . $type->type_id, 'class' => '')) }}
	@endforeach
@endsection