@extends('layouts.layoutBackoffice')
@section('head')
<script src="../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
<script>
	$(document).ready(function(){
		$(".addItem").click(function(){
			$(".addFields").append(
				'<div class="form-group"><label for="item_description">Description</label><input name="item_description[]" type="text" id="item_description" class="form-control">'
			);
		});
	});
</script>
@endsection
@section('content')
	<h1>Create an item</h1>
	{{ Form::open(array('url' => 'items', 'class' => 'formMatch')) }}
		{{ Form::label('packages', 'Package')}}
		{{ Form::select('package_list[]', $packages, null, ['multiple', 'class' => 'form-control']) }}
		{{ Form::label('types', 'Type')}}
		{{ Form::select('type_id', $types, null, ['class' => 'form-control']) }}
		{{ Form::label('item_description', 'Description')}}
		{{ Form::text('item_description[]', null, ['class' => 'form-control']) }}

		<div class="form-group">
			{{ Form::button('Add another Item', ['class' => 'addItem form-control']) }}
		</div>

		<div class="addFields form-group">
		
		</div>
	
		{{ Form::submit('Create the Item!', ['class' => '']) }}

	{{ Form::close() }}
@endsection