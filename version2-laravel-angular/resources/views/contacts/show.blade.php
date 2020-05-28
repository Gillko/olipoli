@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $contact->contact_company }}</h1>
	<a href="{{ URL::to('/contacts/' . $contact->contact_id) }}">{{ $contact->contact_id }}</a>
	<p>{{ $contact->contact_title }}</p>
	<p>{{ $contact->contact_company }}</p>
	<p>{{ $contact->contact_phoneA }}</p>
	<p>{{ $contact->contact_phoneB }}</p>
	<p>{{ $contact->contact_email }}</p>
	<p>{{ $contact->contact_information }}</p>
	<p>{{ $contact->contact_button }}</p>
	<p>{{ $contact->contact_anchor }}</p>

	<a href="{{ URL::to('/contacts/' . $contact->contact_id . '/edit') }}">{{ Form::button('Edit', array('class' => 'button succes'))}}</a>
	{{ Form::open(array('url' => 'contacts/' . $contact->contact_id, 'class' => '')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::button('Delete', array('type' => 'submit', 'class' => ''))}}
	{{ Form::close() }}
@endsection