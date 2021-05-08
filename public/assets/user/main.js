var app = angular.module('myApp', ['ngMaterial'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('MyController',  function($scope, $http, $location, $window){

    $http.get("./api/category").then(function(res) {
        $scope.category = res.data;
    })

    $scope.categoryName = function ($name) {
        //console.log($name);
        $http.get("./api/category/" + $name + "").then(function(res) {
            $scope.cate = res.data;
            $window.location.href = "/";
            console.log($scope.cate);
        })
        
        
    }
    console.log($scope.cate);
})

app.controller('cateController',  function($scope, $http, $location, $window){
    $scope.cate = function (name) {
        var config = {
            headers: {
                'APP_KEY':'ABCDE'
            }
        }
        $http.get("../api/category/" + name, config).then(function(res) {
            $scope.category = res.data;
        })
    }
    

})