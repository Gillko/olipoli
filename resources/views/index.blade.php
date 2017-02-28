<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Olipoli</title>
		<script type="text/javascript" src="assets/js/libraries/jquery/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/libraries/bootstrap/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/libraries/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	</head>
	<body ng-app="olipoli">
		<div ng-controller="mainCtrl">
			<header>
				<nav class="navbar navbar-default navbar-op navbar-default-op">
				  <div class="container">
				    <!-- Brand and toggle get grouped for better mobile display -->
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
				    	<ul ng-repeat="listitem in listitems" class="nav navbar-nav">
							<li class="listitem-op">
								<a href="{[{listitem.listitem_anchor}]}" class="link-op">{[{listitem.listitem_title}]}</a>
							</li>
						</ul>
				    </div>
				  </div>
				</nav>
				{{-- <nav class="navbar navbar-op">
					<div class="container">
						<div class="navbar-header">
							<a class="navbar-brand" href="/"><img ng-repeat="picture in pictures" ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" ng-if="picture.picture_type == 'logo'"></img></a>
						</div>
						<ul ng-repeat="listitem in listitems | orderBy : '-listitem_id'" class="nav navbar-nav navbar-right">
							<li class="listitem-op"><a href="{[{listitem.listitem_anchor}]}" class="link-op">{[{listitem.listitem_title}]}</a></li>
						</ul>
					</div>
				</nav> --}}

				{{-- <img ng-repeat="picture in pictures" ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" ng-if="picture.picture_type == 'hero image'"></img> --}}
			</header>
			
			<div class="container">
				<div class="content-box row">
					<div class="col-md-12" ng-repeat="content in contents" ng-if="content.content_type == 'onze-kracht'">
						<h1 id="{[{content.content_anchor}]}">{[{content.content_title}]}</h1>
						<h2 ng-if="content.content_subtitle != 0">{[{content.content_subtitle}]}</h2>
						<p class="text">{[{content.content_description}]}</p>
						<button ng-if="content.content_button != 0">{[{content.content_button}]}</button>
						<div ng-repeat="picture in content.pictures">
							<img ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" />
						</div>
					</div>
				</div>
			</div>

			<div class="packages">
				<div class="container">
					<div ng-repeat="package in packages">
						<h1 class="heading-package">{[{package.package_name}]}</h1>
						<p>{[{package.package_description}]}</p>
						<div ng-repeat="type in package.types">
							<h2 class="subheading-package"><b>{[{type.type_name}]}</b></h2>
							<ol ng-repeat="item in package.items" ng-if="type.type_id == item.type_id">
								<li class="text-package">
									{[{item.item_description}]}
								</li>
							</ol>
						</div>
						<h3 class="price-package">{[{package.package_price}]}</h3>
						<p class="conditions-package"><small>{[{package.package_conditions}]}</small></p>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="content-box row">
					<div class="col-md-12" ng-repeat="content in contents" ng-if="content.content_type != 'footer' && content.content_type != 'onze-kracht'">
						<h1 id="{[{content.content_anchor}]}">{[{content.content_title}]}</h1>
						<h2 ng-if="content.content_subtitle != 0">{[{content.content_subtitle}]}</h2>
						<p class="text">{[{content.content_description}]}</p>
						<button ng-if="content.content_button != 0">{[{content.content_button}]}</button>
						<div ng-repeat="picture in content.pictures">
							<img ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" />
						</div>
					</div>
				</div>

				<div ng-repeat="contact in contacts">
					<h1 id="{[{contact.contact_anchor}]}">{[{contact.contact_title}]}</h1>
					<p>{[{contact.contact_company}]}</p>
					<p>{[{contact.contact_phoneA}]}</p>
					<p>{[{contact.contact_phoneB}]}</p>
					<p>{[{contact.contact_email}]}</p>
					<p>{[{contact.contact_information}]}</p>
					<div ng-repeat="address in contact.addresses">
						<p>{[{address.address_street}]}</p>
						<p>{[{address.address_number}]}</p>
						<p>{[{address.address_city}]}</p>
						<p>{[{address.address_postalcode}]}</p>
						<p>{[{address.address_latitude}]}</p>
						<p>{[{address.address_longitude}]}</p>
					</div>
				</div>

				<div ng-repeat="content in contents" ng-if="content.content_type == 'footer'">
					<p>{[{content.content_title}]}</p>
					<p>{[{content.content_description}]}/<p>
					<div ng-repeat="picture in content.pictures">
						<img ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}"></img>
					</div>
				</div>
			</div>
			
		</div>
		<script src="assets/js/libraries/angular/angular.js" type="text/javascript"></script>
		<script src="assets/js/angular.js" type="text/javascript"></script>
	</body>
</html>