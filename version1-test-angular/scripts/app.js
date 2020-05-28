angular.module("olipoli", [])

.controller('mainCtrl', function($scope){
	$scope.formulas = 
	[
		{
			'formulaId': 1,
			'formulaName': 'Pro Wash',
			'formulaSorts': [{
					"formulaSortsName" : "Exterieur",
					"items":
						[
							{"itemName": "Afspuiten van de wagen met HD"},
							{"itemName": "Wassen met PH-neutrale Shampoo"},
							{"itemName": "Reinigen van de ramen"},
							{"itemName": "Reinigen van de velgen en wielkasten"},
							{"itemName": "Behandeling van de banden"},
							{"itemName": "Afwerken met een detailspray"}
						]
				},
				{
					"formulaSortsName" : "Interieur",
					"items":
					[
							{"itemName": "De wagen volledig stofzuigen"}
					]
				}
			]
		},
		{
			'formulaId': 2,
			'formulaName': 'Pro Wash & Wax',
			'formulaSorts':
			[
				{
					"formulaSortsName" : "Exterieur",
					"items":
						[
							{"itemName": "Afspuiten van de wagen met HD"},
							{"itemName": "Wassen met PH-neutrale Shampoo"},
							{"itemName": "Reinigen van de ramen"},
							{"itemName": "Clayen van de wagen"},
							{"itemName": "Aanbrengen van de wax"},
							{"itemName": "Ontvetten en voeden van de banden"},
							{"itemName": "Reinigen van de velgen en wielkasten"}
						]
				},
				{
					"formulaSortsName" : "Interieur",
					"items":
					[
							{"itemName": "De wagen volledig stofzuigen"},
							{"itemName": "Zetels proper maken"},
							{"itemName": "Afstoffen van de deuren"},
							{"itemName": "Afstoffen van het dashboard"},
							{"itemName": "Reinigen van de ramen"},
					]
				}
			]
		},
	]
});