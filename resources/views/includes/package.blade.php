{{-- <div class="cd-half-block image"></div> --}}
<div>
	<h1 class="heading-package">{[{package.package_name}]}</h1>
	<span class="line">&nbsp;</span>
	<p>{[{package.package_description}]}</p>
	<div class="package-styles-op">
		<div ng-repeat="type in package.types">
			<h2 class="subheading-package"><b>{[{type.type_name}]}</b></h2>
			<p ng-repeat="item in package.items" ng-if="type.type_id == item.type_id">
				{{-- <li class="text-package"> --}}
					{[{item.item_description}]}
				{{-- </li> --}}
			</p>
		</div>
	</div>
	<h3 class="price-package">{[{package.package_price}]}</h3>
	<p class="conditions-package"><small>{[{package.package_conditions}]}</small></p>
</div>