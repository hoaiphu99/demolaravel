var app = angular.module('myApp',['ngMaterial'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.controller('MyController',  function($scope){

	$scope.sua = function(x) {
		x.hienra = !x.hienra;
	}
	
	$scope.nhieunguoi = [
		{
			ten: "Viet",
			namsinh: "1986",
			facebook: "fb.com/nddviet",
			dienthoai: "0123456789"
		},

		{
			ten: "Nam",
			namsinh: "1991",
			facebook: "fb.com/nam",
			dienthoai: "0123654234"
		},

		{
			ten: "Han",
			namsinh: "1999",
			facebook: "fb.com/han",
			dienthoai: "03213848123"
		}

	]
})