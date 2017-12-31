@extends('layouts.layoutBackoffice')
@section('head')
	<script src="../../assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".hideShow").css("display", "none");
			$(".removeContent").hide();

			$(".addContent").click(function(){
				$(".select").removeAttr('disabled');
				$(".hideShow").css("display", "inline");
				$(".removeContent").show();
				$(this).hide();
			});
			$(".removeContent").click(function(){
				$(".select").attr('disabled');
				$(".hideShow").css("display", "none");
				$(".addContent").show();
				$(this).hide();
			});
		});
	</script>
@endsection
@section('content')
	<h1>{{ $picture->picture_title }}</h1>
	{{ Form::model($picture,['url' => '/pictures/'.$picture->picture_id, 'method' => 'PUT', 'files'=>true]) }}
	{{-- {{ Form::model($picture, ['method' => 'PUT', 'action' => ['PictureController@update', $picture->picture_id]], 'files' => true)) }} --}}
		{{ Form::label('picture_title', 'Title')}}
		{{ Form::text('picture_title', null, ['class' => 'form-control']) }}
		{{ Form::label('picture_description', 'Description')}}
		{{ Form::textarea('picture_description', null, ['class' => 'form-control']) }}
		{{ Form::label('picture_alt', 'Alt')}}
		{{ Form::text('picture_alt', null, ['class' => 'form-control']) }}
		{{ Form::label('picture_url', 'URL')}}
		{{ Form::file('picture_url', null, ['class' => 'form-control']) }}
		{{ Form::label('picture_type', 'Type')}}
		{{ Form::text('picture_type', null, ['class' => 'form-control']) }}

		<div class="hideShow form-group">
			{{ Form::label('contents', 'Content')}}
			{{ Form::select('content_id', $contents, null, ['class' => 'form-control select', 'disabled']) }}
		</div>

		<br/>

		<div class="form-group">
			{{ Form::button('Assign the picture to some content', ['class' => 'addContent form-control']) }}
			{{ Form::button('Unassign the picture to some content', ['class' => 'removeContent form-control']) }}
		</div>

		{{ Form::submit('Edit the Picture!', array('class' => '')) }}
	{{ Form::close() }}
@endsection