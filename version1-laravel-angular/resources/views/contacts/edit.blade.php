@extends('layouts.layoutBackoffice')
@section('content')
	<h1>{{ $contact->contact_company }}</h1>
	{{ Form::model($contact, ['method' => 'PUT', 'action' => ['ContactController@update', $contact->contact_id]]) }}
		{{ Form::label('contact_title', 'Title')}}
		{{ Form::text('contact_title', null, ['class' => 'form-control']) }}
		{{ Form::label('contact_company', 'Company')}}
		{{ Form::text('contact_company', null, ['class' => 'form-control']) }}
		{{ Form::label('contact_phoneA', 'Phone A')}}
		{{ Form::text('contact_phoneA', null, ['class' => 'form-control']) }}
		{{ Form::label('contact_phoneB', 'Phone B')}}
		{{ Form::text('contact_phoneB', null, ['class' => 'form-control']) }}
		{{ Form::label('contact_email', 'Email')}}
		{{ Form::text('contact_email', null, ['class' => 'form-control']) }}
		{{ Form::label('contact_information', 'Information')}}
		{{ Form::text('contact_information', null, ['class' => 'form-control']) }}
		{{ Form::label('contact_button', 'Button')}}
		{{ Form::text('contact_button', null, ['class' => 'form-control']) }}
		{{ Form::label('contact_anchor', 'Anchor')}}
		{{ Form::text('contact_anchor', null, ['class' => 'form-control']) }}

		{{ Form::submit('Edit the Contact block!', array('class' => '')) }}
	{{ Form::close() }}
@endsection