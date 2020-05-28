@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $address->address_street }}</h1>
	<p>{{ $address->address_number }}</p>
	<p>{{ $address->address_city }}</p>
	<p>{{ $address->address_postalcode }}</p>
	<p>{{ $address->address_latitude }}</p>
	<p>{{ $address->address_longitude }}</p>
	
	{{-- @unless ($address->contact != 'NULL') --}}
		<p>Contact:</p>
		<p>{{ $address->contact->contact_company }}</p>
	{{-- @endunless --}}
	<a href="{{ URL::to('/addresses/' . $address->address_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'addresses/' . $address->address_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection