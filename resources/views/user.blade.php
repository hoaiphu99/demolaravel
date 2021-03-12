<!DOCTYPE html>
<html lang="en"  >
<head>
	<title> Document  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 	
	<link rel="stylesheet" href="{{ secure_asset('vendor/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendor/angular-material.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/1.css') }}">

</head>
<body ng-app="myApp" ng-controller="MyController">

	<div class="inra">
		<div class="container">
			<div class="jumbotron">
				<h1 class="display-4">Hello, world!</h1>
				<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				<hr class="my-4">
				<ul>
					<div ng-repeat="u in user" ng-init="u.hienra=false">
						<div class="card bg-primary|secondary|success|danger|warning|info|light|dark border-primary|secondary|success|danger|warning|info|light|dark sua" ng-show="u.hienra">
							<div class="card-header">
								Thông tin về <input type="text" class="form-control" ng-model="u.name">
							</div>
							<div class="card-body pl-1 pr-1 pt-1 pb-1">
								<input type="hidden" class="form-control" ng-model="u.id"> <br>
								<b>Năm sinh: </b> <input type="text" class="form-control" ng-model="u.birthday"> <br>
								<b>Facebook: </b> <input type="text" class="form-control" ng-model="u.facebook"> <br>
								<b>Điện thoại: </b> <input type="text" class="form-control" ng-model="u.phone"> <br>
								<b class="float-xs-center btn btn-danger btn-block" ng-click="update(u)">Lưu</b>
							</div>
						</div>
						<div class="card bg-primary|secondary|success|danger|warning|info|light|dark border-primary|secondary|success|danger|warning|info|light|dark" ng-show="!u.hienra">
							<div class="card-header">
								<b class="float-xs-right"><i class="fa fa-pencil" ng-click="sua(u)"></i></b>
								Thông tin về <%u.name%></div>
							<div class="card-body text-primary|secondary|success|danger|warning|info|light|dark pl-1 pr-1 pt-1 pb-1">
								<b>Năm sinh: </b> <i><%u.birthday%></i> <br>
								<b>Facebook: </b> <i><%u.facebook%></i> <br>
								<b>Điện thoại: </b> <i><%u.phone%></i> <br>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="{{ secure_asset('vendor/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('vendor/angular-1.5.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('vendor/angular-animate.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset(''vendor/angular-aria.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('vendor/angular-messages.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('vendor/angular-material.min.js') }}"></script>
	<script type="text/javascript" src="{{ secure_asset('js/1.js') }}"></script>
</body>
</html>