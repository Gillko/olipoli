@extends('layouts.layoutBackoffice')
@section('head')
{{-- <script src="../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
<script>
	$(document).ready(function(){
		$(".addItem").click(function(){
			$(".addFields").append(
				'<div class="form-group"><label for="item_description">Description</label><input name="item_description[]" type="text" id="item_description" class="form-control">'
			);
		});
	});
</script> --}}
@endsection
@section('content')
	<h1>Create a listitem</h1>
	{{ Form::open(array('url' => 'listitems', 'class' => 'formMatch')) }}
		{{ Form::label('navigations', 'Navigation')}}
		{{ Form::select('navigation_id', $navigations, null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_title', 'Title')}}
		{{ Form::text('listitem_title', null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_description', 'Description')}}
		{{ Form::textarea('listitem_description', null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_anchor', 'Anchor')}}
		{{ Form::text('listitem_anchor', null, ['class' => 'form-control']) }}
		{{ Form::label('listitem_position', 'Position')}}
		{{ Form::text('listitem_position', null, ['class' => 'form-control']) }}

		{{-- <div class="form-group">
			{{ Form::button('Add another Item', ['class' => 'addItem form-control']) }}
		</div>

		<div class="addFields form-group">
		
		</div> --}}
	
		{{ Form::submit('Create the Listitem!', ['class' => '']) }}

	{{ Form::close() }}
@endsection