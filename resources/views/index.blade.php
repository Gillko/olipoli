<!doctype html>
<html class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Olipoli</title>
		<script src="assets/modernizr.js"></script>
		<script type="text/javascript" src="assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/libraries/bootstrap/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="assets/css/libraries/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/libraries/fontawesome/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	</head>
	<body ng-app="olipoli">
		<div ng-controller="mainCtrl">
			<header>
				<nav class="navbar navbar-default navbar-op navbar-default-op">
				  <div class="container">
					<div class="navbar-header">
					  <a href="/">
						<img class="hero-image-op" ng-repeat="picture in pictures" ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" ng-if="picture.picture_type == 'logo'" />
					  </a>

					  <button type="button" class="navbar-toggle navbar-toggle-op collapsed mobile-navigation-button" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar icon-bar-op"></span>
						<span class="icon-bar icon-bar-op"></span>
						<span class="icon-bar icon-bar-op"></span>
					  </button>
					</div>

					<div class="collapse navbar-collapse navbar-right navbar-collapse-op" id="menu-collapse">
						<ul ng-repeat="listitem in listitems | orderBy : 'listitem_position'" class="nav navbar-nav">
							<li class="listitem-op">
								<a href="{[{listitem.listitem_anchor}]}" class="link-op">{[{listitem.listitem_title}]}</a>
							</li>
						</ul>
					</div>
				  </div>
				</nav>
			</header>
			
			<div class="container">
				<div class="content-box row">
					<div class="col-md-12" ng-repeat="content in contents" ng-if="content.content_type == 'onze-kracht'">
						<h1 id="{[{content.content_anchor}]}">{[{content.content_title}]}</h1>
						<h2 ng-if="content.content_subtitle != 0">{[{content.content_subtitle}]}</h2>
						<p class="text">{[{content.content_description}]}</p>
						<a href="{[{content.content_buttonAnchor}]}" class="link-op">
							<button ng-if="content.content_button != 0">{[{content.content_button}]}</button>
						</a>
						<div ng-repeat="picture in content.pictures">
							<img ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" />
						</div>
					</div>
				</div>
			</div>

			<div class="packages" id="formules">
				<div class="container">
					<div class="cd-slider-wrapper">
						<ul class="cd-slider">
							<li class="is-visible">
								<div class="cd-half-block image"></div>
								<div class="cd-half-block content content-1">
									<div ng-repeat="package in packages" ng-if="package.package_id == 1">
										@include('includes.package')
									</div>
								</div>
							</li>
							<li>
								<div class="cd-half-block image"></div>
								<div class="cd-half-block content">
									<div ng-repeat="package in packages" ng-if="package.package_id == 2">
										@include('includes.package')
									</div>
								</div>
							</li>
							<li>
								<div class="cd-half-block image"></div>
								<div class="cd-half-block content">
									<div ng-repeat="package in packages" ng-if="package.package_id == 3">
										@include('includes.package')
									</div>
								</div>
							</li>
							<li>
								<div class="cd-half-block image"></div>
								<div class="cd-half-block content">
									<div ng-repeat="package in packages" ng-if="package.package_id == 4">
										@include('includes.package')
									</div>
								</div>
							</li>
							<li>
								<div class="cd-half-block image"></div>
								<div class="cd-half-block content">
									<div ng-repeat="package in packages" ng-if="package.package_id == 5">
										@include('includes.package')
									</div>
								</div>
							</li>
							<li>
								<div class="cd-half-block image"></div>
								<div class="cd-half-block content">
									<div ng-repeat="package in packages" ng-if="package.package_id == 6">
										@include('includes.package')
									</div>
								</div>
							</li>
							<li>
								<div class="cd-half-block image"></div>
								<div class="cd-half-block content">
									<div ng-repeat="package in packages" ng-if="package.package_id == 7">
										@include('includes.package')
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="content-box-multiple-op row" ng-repeat="content in contents | orderBy : 'content_position'" ng-if="content.content_type != 'footer' && content.content_type != 'onze-kracht'">
					<div class="col-md-12">
						<h1 id="{[{content.content_anchor}]}">{[{content.content_title}]}</h1>
						<h2 ng-if="content.content_subtitle != 0">{[{content.content_subtitle}]}</h2>
						<p class="text">{[{content.content_description}]}</p>
						<div class="row pictures">
							<div class="col-md-4" ng-repeat="picture in content.pictures">
								<img class="picture" ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" />
							</div>
						</div>
						<button ng-if="content.content_button != 0">{[{content.content_button}]}</button>
					</div>
				</div>

				<div class="contact content-box content-box-last row">
					<div class="col-md-6">
						<div ng-repeat="contact in contacts">
							<h1 id="{[{contact.contact_anchor}]}">{[{contact.contact_company}]}</h1>
							<div ng-repeat="address in contact.addresses">
								<p>{[{address.address_street}]} {[{address.address_number}]},</p>
								<p>{[{address.address_postalcode}]} {[{address.address_city}]}</p>

								<p><span class="main-color bold">M.</span> {[{contact.contact_phoneA}]}</p>
								<p ng-if="contact.contact_phoneB != 0">{[{contact.contact_phoneB}]}</p>
								<p><span class="main-color bold">E.</span> {[{contact.contact_email}]}</p>
								<p class="main-color bold uppercase">{[{contact.contact_information}]}</p>
								<a href="mailto:{[{contact.contact_email}]}">
									<button>{[{contact.contact_button}]}</button>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div id="map"></div>
					</div>
				</div>
			</div>

			{{-- <div id="map"></div> --}}

			<footer ng-repeat="content in contents" ng-if="content.content_type == 'footer'">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="text-left">
								<p>{[{content.content_title}]}</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="text-right">
								<a href="{[{social.social_link}]}" target="_blank" ng-repeat="social in content.socials">
									<i class="fa {[{social.social_fontawesome}]} fa-2x" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<script src="assets/js/libraries/angular/angular.js" type="text/javascript"></script>
		<script src="assets/js/angular.js" type="text/javascript"></script>

		<script src="assets/jquery-2.1.4.js"></script>
		<script src="assets/jquery.mobile.custom.min.js"></script>
		<script src="assets/js/libraries/pointy-slider/main.js"></script>
		<script>

		</script>
		<script>
			function initMap(latitude, longitude) {
				var geocodingAPI = "http://localhost:8888/public/addresses_json";
 
				$.getJSON(geocodingAPI, function (json) {
				    var latitude = JSON.parse(json[0].address_latitude);
			     	var longitude = JSON.parse(json[0].address_longitude);

				    var myLatLng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 12,
						center: myLatLng
					});

					var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: 'Olipoli!'
					});
				});	 
			}
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjN7k0oVLfPI5jh9L29xvKjwDOqs4lf50&callback=initMap"></script>
	</body>
</html>