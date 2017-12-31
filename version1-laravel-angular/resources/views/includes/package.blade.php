<h1 class="heading-package">{[{package.package_name}]}</h1>
<span class="line">&nbsp;</span>
<p class="package-description-op" ng-if="package.package_description != 0"><b>{[{package.package_description}]}</b></p>
<div class="package-styles-op">
	<div class="types-op" ng-repeat="type in package.types" ng-if="type.type_name != 0">
		<h2 class="subheading-package"><b>{[{type.type_name}]}</b></h2>
		<p class="item-op" ng-repeat="item in package.items" ng-if="type.type_id == item.type_id">{[{item.item_description}]}</p>
	</div>
</div>
<h3 class="price-package">{[{package.package_price}]}</h3>
<p class="conditions-package"><small>{[{package.package_conditions}]}</small></p>