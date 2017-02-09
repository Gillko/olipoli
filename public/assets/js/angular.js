/*angular.module("olipoli", function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })*/

angular.module('olipoli', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
})

.controller('mainCtrl', function($scope, $http){
	
	$http.get('http://localhost:8888/public/listitems_json')
		.then(function(res){
			$scope.listitems = res.data;
		});

	$http.get('http://localhost:8888/public/pictures_json')
		.then(function(res){
			$scope.pictures = res.data;
		});

	$http.get('http://localhost:8888/public/contents_json')
		.then(function(res){
			$scope.contents = res.data;
		});

	$http.get('http://localhost:8888/public/contacts_json')
		.then(function(res){
			$scope.contacts = res.data;
		});

	$http.get('http://localhost:8888/public/packages_json')
		.then(function(res){
			$scope.packages = res.data;
		});
	})
.filter('unique', function () {
	return function(collection, keyname) {
		var output = [], 
		keys = [];

	  angular.forEach(collection, function(item) {

		var key = item[keyname];
		if(keys.indexOf(key) === -1) {
			keys.push(key);

			output.push(item);
		}
	});
		return output;
	};
});