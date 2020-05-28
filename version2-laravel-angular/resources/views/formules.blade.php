<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Olipoli</title>
		<link rel="stylesheet" type="text/css" href="assets/css/olipoli.css">
	</head>
	<body ng-app="olipoli">
		<div ng-controller="mainCtrl">
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