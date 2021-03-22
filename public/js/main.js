var app = angular.module('myApp', ['ngMaterial'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('MyController',  function($scope, $http, $location, $window){

    $scope.show = function(u) {
		u.show = !u.show;
	}
    //$scope.show = false;
    $scope.show1 = function() {
		$scope.show = !$scope.show;
	}

    $http.get("../api/user").then(function (res) {
        $scope.user = res.data;
    });
    // lay duong dan trang dang dung
    var url = $location.url();
    $scope.create = function (u) {
        $scope.show = !$scope.show;
        var data = $.param({
            id:u.id,
            username:u.username,
            password:u.password,
            name:u.name,
            email:u.email,
            phone:u.phone,
            birthday:u.birthday
        });
        var config = {
            headers: {
                'Content-type':'application/x-www-form-urlencoded;charset=UTF-8'
            }
        }
        $http.post("../api/user", data, config).then(function (res) {
            $window.location.href = url;
            console.log(res.data);
        }, function(res) {
            console.log(res.data);
        });
    }

    $scope.update = function (u) {
        var data = $.param({
            id:u.id,
            username:u.username,
            password:u.password,
            name:u.name,
            email:u.email,
            phone:u.phone,
            birthday:u.birthday
        });
        var config = {
            headers: {
                'Content-type':'application/x-www-form-urlencoded;charset=UTF-8'
            }
        }
        u.show = !u.show;
        
        $http.put("../api/user/" + u.id + "",data, config).then(function(res) {
            console.log(res.data);
        }, function(res) {
            console.log(res.data);
        });
    }

    $scope.delete = function(u) {
        $http.delete("../api/user/" + u.id + "").then(function(res) {
            console.log(res.data);
        }, function(res) {
            $window.location.href = url;
            console.log(res.data);
        });
    }
})
