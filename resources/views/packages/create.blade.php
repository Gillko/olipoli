@extends('layouts.layoutBackoffice')
@section('head')
<script src="../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
<script>
	/*$(document).ready(function(){
		$(".addFrame").click(function(){
			$(".addFields").append(
				'<div class="form-group"><label for="frame_name">Name</label><input name="frame_name[]" type="text" id="frame_name" class="form-control"></div><div class="form-group"><label for="frame_scorePlayerHome">Score Player Home</label><input name="frame_scorePlayerHome[]" type="text" id="frame_scorePlayerHome" class="form-control"></div><div class="form-group"><label for="frame_breakPlayerHome">Break Player Home</label><input name="frame_breakPlayerHome[]" type="text" id="frame_breakPlayerHome" class="form-control"></div><div class="form-group"><label for="frame_scorePlayerAway">Score Player Away</label><input name="frame_scorePlayerAway[]" type="text" id="frame_scorePlayerAway" class="form-control"></div><div class="form-group"><label for="frame_breakPlayerAway">Break Player Away</label><input name="frame_breakPlayerAway[]" type="text" id="frame_breakPlayerAway" class="form-control"></div>'
			);
		});
	});*/
</script>
@endsection
@section('content')
	<h1>Create a package</h1>
	{{ Form::open(array('url' => 'packages', 'class' => 'formMatch')) }}
	{{ Form::label('types', 'Type')}}
	{{ Form::select('type_list[]', $types, null, ['multiple', 'class' => 'form-control']) }}
	{{ Form::label('items', 'Item')}}
	{{ Form::select('item_list[]', $items, null, ['multiple', 'class' => 'form-control']) }}
	{{ Form::label('package_name', 'Name')}}
	{{ Form::text('package_name', null, ['class' => 'form-control']) }}
	{{ Form::label('package_description', 'Description')}}
	{{ Form::text('package_description', null, ['class' => 'form-control']) }}
	{{ Form::label('package_conditions', 'Conditions')}}
	{{ Form::text('package_conditions', null, ['class' => 'form-control']) }}
	{{ Form::label('package_price', 'Price')}}
	{{ Form::text('package_price', null, ['class' => 'form-control']) }}

	{{-- <div class="form-group">
		{{ Form::button('Add another Frame', ['class' => 'addFrame form-control']) }}
	</div>

	<div class="addFields form-group">
		
	</div> --}}

	<div class="form-group">
		{{ Form::submit('Create the Package!', ['class' => '']) }}
	</div>

	{{-- {{!! Form::hidden('_token','csrf_token()') !!}} --}}
	{{ Form::close() }}
@endsection