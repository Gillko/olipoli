@extends('layouts.layoutBackoffice')
@section('head')
{{-- <script src="assets/js/libraries/jquery/jquery3.1.1.min.js"></script>
<script>
$(document).ready(function() {
	list_users();
});
function list_users(){
	$.ajax({
		url: '/public/packages_json', // This is the url we gave in the route
	    method: 'GET', // Type of response and matches what we said in the route
	    dataType: 'json',
	    success: function(data){ // What to do if we succeed
	    	for (var i = 0; i < data.length; i++) {
	    		var packages = data[i];
	    		$('#users').append('<option class="user">' + packages.package_id + " " + packages.package_name + '</option>');
	    	}
	    },
	    error: function(){
	    	window.alert("error");
	    }
	});
};
</script> --}}
@endsection
@section('content')
	<h1>Packages</h1>
	<a href="{{ URL::to('/packages/create') }}">{{ Form::button('Create', array('class' => 'button success'))}}</a>
	@foreach($packages as $package)
		<p><a href="{{ URL::to('/packages/' . $package->package_id) }}">{{ $package->package_id }}</a></p>
		<p>{{ $package->package_name }}</p>
		<p>{{ $package->package_description }}</p>
		<p>{{ $package->package_conditions }}</p>
		<p>{{ $package->package_price }}</p>
		@unless ($package->types->isEmpty())
			<p>Types:</p>
			@foreach ($package->types as $type)
				<p><a href="{{ URL::to('/types/' . $type->type_id) }}">{{ $type->type_name }}</a></p>
			@endforeach
		@endunless
		@unless ($package->items->isEmpty())
			<p>Items:</p>
			@foreach ($package->items as $item)
				<p><a href="{{ URL::to('/items/' . $item->item_id) }}">{{ $item->item_description }}</a></p>
			@endforeach
		@endunless
		<p>{{ Form::open(array('url' => 'packages/' . $package->package_id, 'class' => '')) }}
	@endforeach
	{{-- <select id ="users">
	</select> --}}
@endsection