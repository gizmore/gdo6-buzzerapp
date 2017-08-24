"use strict";
angular.module('gdo6').
controller('BUZCtrl', function($scope) {
	
	$scope.data = $scope.data || {};
	$scope.data.buttons = []; 
	
	$scope.initJSON = function(json) {
		console.log('BUZCtrl.initJSON()', json);
		$scope.data.buttons = json.buttons;
	};
	
	$scope.play = function(button) {
		console.log('BUZCtrl.play()', button);
		new Audio($scope.audioUrlForButton(button)).play();
	};
	
	$scope.audioUrlForButton = function(button) {
		return "index.php?mo=Buzzerapp&me=Audio&button="+button.button_id;
	};
	
	$scope.imageUrlForButton = function(button) {
		return "index.php?mo=Buzzerapp&me=Icon&button="+button.button_id;
	};
	
	$scope.onKeyDown = function($event) {
		
	};
});
