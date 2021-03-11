var app = angular.module('myApp',['ngMaterial']);
app.controller('MyController',  function($scope, $http){

	$scope.sua = function(x) {
		x.hienra = !x.hienra;
	}

	$http.get("api/user").then(function (res) {
        //console.log(res.data);
        $scope.user = res.data;
    });

    $scope.update = function (u) {
        // du lieu gui di
        var data = $.param({
            id:u.id,
            Name:u.Name,
            Birdthday:u.Birdthday,
            Facebook:u.Facebook,
            Phone:u.Phone
        }); 
        var config = {
            headers: {
                'Content-type':'application/x-www-form-urlencoded;charset=UTF-8'
            }
        }
        u.hienra = !u.hienra;
        $http.put("api/user/"+ u.id +"", data, config).then(function(res){

            console.log(res.data);

        }, function(res){
            console.log(res.data);

        });
    }

	// $scope.nhieuu = [
	// 	{
	// 		ten: "Viet",
	// 		namsinh: "1986",
	// 		facebook: "fb.com/nddviet",
	// 		dienthoai: "0123456789"
	// 	},
    //
	// 	{
	// 		ten: "Nam",
	// 		namsinh: "1991",
	// 		facebook: "fb.com/nam",
	// 		dienthoai: "0123654234"
	// 	},
    //
	// 	{
	// 		ten: "Han",
	// 		namsinh: "1999",
	// 		facebook: "fb.com/han",
	// 		dienthoai: "03213848123"
	// 	}
    //
	// ]
})
