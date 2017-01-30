<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Olipoli</title>
		<link rel="stylesheet" type="text/css" href="assets/css/olipoli.css">
	</head>
	<body ng-app="olipoli">
		<div ng-controller="mainCtrl">
			<img ng-repeat="picture in pictures" ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" ng-if="picture.picture_type == 'logo'"></img>
			
			<ul ng-repeat="listitem in listitems">
				<li><a href="{[{listitem.listitem_anchor}]}">{[{listitem.listitem_title}]}</a></li>
			</ul>

			<img ng-repeat="picture in pictures" ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}" ng-if="picture.picture_type == 'hero image'"></img>

			<div ng-repeat="content in contents">
				<h1 id="{[{content.content_anchor}]}">{[{content.content_title}]}</h1>
				<h2 ng-if="content.content_subtitle != 0">{[{content.content_subtitle}]}</h2>
				<p>{[{content.content_description}]}</p>
				<button ng-if="content.content_button != 0">{[{content.content_button}]}</button>
				<div ng-repeat="picture in content.pictures">
					<img ng-src="uploads/{[{picture.picture_url}]}" alt="{[{picture.picture_alt}]}"></img>
				</div>
			</div>

			<div ng-repeat="package in packages">
				<h1>{[{package.package_name}]}</h1>
				<p>{[{package.package_description}]}</p>
				<div ng-repeat="type in package.types">
					<h2>{[{type.type_name}]}</h2>
					<div ng-repeat="item in package.items" ng-if="type.type_id == item.type_id">
						<p>{[{item.item_description}]}</p>
					</div>
				</div>
				<h3>{[{package.package_price}]}</h3>
				<p>{[{package.package_conditions}]}</p>
			</div>
		</div>
		<script src="assets/js/libraries/angular/angular.js" type="text/javascript"></script>
		<script src="assets/js/angular.js" type="text/javascript"></script>
	</body>
</html>