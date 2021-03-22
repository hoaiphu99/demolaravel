var app = angular.module('myApp', ['ngMaterial'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('MyController',  function($scope, $http, $location){
    var url = $location.url();
    console.log(url);
    $http.get("http://localhost:81/WebChiaSeAnh/public/api/user").then(function (res) {
        console.log(url);
        $scope.user = res.data;
    })
})
