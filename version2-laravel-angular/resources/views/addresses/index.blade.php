@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Addresses</h1>
	<a href="{{ URL::to('/addresses/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($addresses as $address)
		<p><a href="{{ URL::to('/addresses/' . $address->address_id) }}">{{ $address->address_id }}</a></p>
		<p>{{ $address->address_street }}</p>
		<p>{{ $address->address_number }}</p>
		<p>{{ $address->address_city }}</p>
		<p>{{ $address->address_postalcode }}</p>
		<p>{{ $address->address_latitude }}</p>
		<p>{{ $address->address_longitude }}</p>
		@unless ($address->contact != 'NULL')
			<p>Contact:</p>
			<p>{{ $address->contact->contact_company }}</p>
		@endunless
	@endforeach
@endsection