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
	<h1>Create a social icon and link</h1>
	{{ Form::open(array('url' => 'socials', 'class' => 'formMatch')) }}
		{{ Form::label('social_fontawesome', 'Fontawesome')}}
		{{ Form::text('social_fontawesome', null, ['class' => 'form-control']) }}
		{{ Form::label('social_link', 'Link')}}
		{{ Form::text('social_link', null, ['class' => 'form-control']) }}
		{{ Form::label('contents', 'Content')}}
		{{ Form::select('content_id', $contents, null, ['class' => 'form-control select']) }}

		{{ Form::submit('Create the Social link!', ['class' => '']) }}
	{{ Form::close() }}
@endsection