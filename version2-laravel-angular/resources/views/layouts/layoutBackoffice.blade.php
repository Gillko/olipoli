<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link rel="shortcut icon" href="{{ url('assets/img/favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ url('assets/img/favicon.ico') }}" type="image/x-icon">
		<!-- META FACEBOOK SHARE-->
		<meta property="og:title" content="" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="" />
		<meta property="og:description" content="" />
		<meta property="og:image" content="" />
		<meta property="og:image:url" content="" />
		<title>Olipoli</title>
		<link rel="shortcut icon" href="" type="image/x-icon">
		<link rel="icon" href="" type="image/x-icon">
		<link href="{{ url('assets/css/libraries/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ url('assets/css/app.css') }}" rel="stylesheet" type="text/css">
		@yield('head')
	</head>
	<body>
		<div class="container-gv">
			<div class="content-gv">
				<div class="row">
					<div class="col-md-4">
						<h1>Backoffice Olipoli</h1>
						@if (Auth::guest())
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ url('/') }}">Homepage</a></li>
								<li><a href="{{ url('navigations') }}">Navigations</a></li>
								<li><a href="{{ url('listitems') }}">Listitems</a></li>
								<li><a href="{{ url('packages') }}">Packages</a></li>
								<li><a href="{{ url('items') }}">Items</a></li>
								<li><a href="{{ url('types') }}">Types</a></li>
								<li><a href="{{ url('contents') }}">Contents</a></li>
								<li><a href="{{ url('pictures') }}">Pictures</a></li>
								<li><a href="{{ url('contacts') }}">Contacts</a></li>
								<li><a href="{{ url('addresses') }}">Addresses</a></li>
							</ul>
						@else
							<ul class="nav nav-pills nav-stacked">
								<li>Welcome {{ Auth::user()->user_username }}</li>
								<li><a href="{{ url('logout') }}">Logout</a></li>
								<li><a href="{{ url('/') }}">Homepage</a></li>
								<li><a href="{{ url('navigations') }}">Navigations</a></li>
								<li><a href="{{ url('listitems') }}">Listitems</a></li>
								<li><a href="{{ url('/packages') }}">Packages</a></li>
								<li><a href="{{ url('items') }}">Items</a></li>
								<li><a href="{{ url('types') }}">Types</a></li>
								<li><a href="{{ url('contents') }}">Contents</a></li>
								<li><a href="{{ url('pictures') }}">Pictures</a></li>
								<li><a href="{{ url('contacts') }}">Contacts</a></li>
								<li><a href="{{ url('addresses') }}">Addresses</a></li>
							</ul>
						@endif
					</div>
					<div class="col-md-8">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
		<script src="{{ url('assets/js/libraries/bootstrap/bootstrap.min.js') }}"></script>
		@yield('bottom-scripts')
	</body>
</html>