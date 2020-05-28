@extends('layouts.layoutBackoffice')
@section('content')
	<h1>Contacts</h1>
	<a href="{{ URL::to('/contacts/create') }}">{{ Form::button('Create', array('class' => ''))}}</a>
	@foreach($contacts as $contact)
		<p><a href="{{ URL::to('/contacts/' . $contact->contact_id) }}">{{ $contact->contact_id }}</a></p>
		<p>{{ $contact->contact_title }}</p>
		<p>{{ $contact->contact_company }}</p>
		<p>{{ $contact->contact_phoneA }}</p>
		<p>{{ $contact->contact_phoneB }}</p>
		<p>{{ $contact->contact_email }}</p>
		<p>{{ $contact->contact_information }}</p>
		<p>{{ $contact->contact_button }}</p>
		<p>{{ $contact->contact_anchor }}</p>
		<p>{{ Form::open(array('url' => 'contacts/' . $contact->contact_id, 'class' => '')) }}
	@endforeach
@endsection