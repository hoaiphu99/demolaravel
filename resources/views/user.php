<!DOCTYPE html>
<html lang="en"  >
<head>
	<title> Document  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 	
	<link rel="stylesheet" href="../resource/vendor/bootstrap.css">
	<link rel="stylesheet" href="../resource/vendor/angular-material.min.css">
	<link rel="stylesheet" href="../resource/vendor/font-awesome.css">
	<link rel="stylesheet" href="../resource/1.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></script>

    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->

</head>
<body ng-app="myApp" ng-controller="MyController">

	<div class="inra">
		<div class="container">
			<div class="jumbotron">
				<h1 class="display-4">Hello, world!</h1>
				<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				<hr class="my-4">
				<ul>
					<div ng-repeat="motnguoi in nhieunguoi" ng-init="motnguoi.hienra=false">
						<div class="card bg-primary|secondary|success|danger|warning|info|light|dark border-primary|secondary|success|danger|warning|info|light|dark sua" ng-show="motnguoi.hienra">
							<div class="card-header">
							Thông tin về <input type="text" class="form-control" ng-model="motnguoi.ten">
							</div>
							<div class="card-body pl-1 pr-1 pt-1 pb-1">
								<b>Năm sinh: </b> <input type="text" class="form-control" ng-model="motnguoi.namsinh"> <br>
								<b>Facebook: </b> <input type="text" class="form-control" ng-model="motnguoi.facebook"> <br>
								<b>Điện thoại: </b> <input type="text" class="form-control" ng-model="motnguoi.dienthoai"> <br>
								<b class="float-xs-center btn btn-danger btn-block" ng-click="sua(motnguoi)">Lưu</b>
							</div>
						</div>
						<div class="card bg-primary|secondary|success|danger|warning|info|light|dark border-primary|secondary|success|danger|warning|info|light|dark" ng-show="!motnguoi.hienra">
							<div class="card-header">
								<b class="float-xs-right"><i class="fa fa-pencil" ng-click="sua(motnguoi)"></i></b>
							Thông tin về {{motnguoi.ten}}</div>
							<div class="card-body text-primary|secondary|success|danger|warning|info|light|dark pl-1 pr-1 pt-1 pb-1">
								<b>Năm sinh: </b> <i>{{motnguoi.namsinh}}</i> <br>
								<b>Facebook: </b> <i>{{motnguoi.facebook}}</i> <br>
								<b>Điện thoại: </b> <i>{{motnguoi.dienthoai}}</i> <br>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="../resource/vendor/bootstrap.js"></script>  
	<script type="text/javascript" src="../resource/vendor/angular-1.5.min.js"></script>  
	<script type="text/javascript" src="../resource/vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="../resource/vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="../resource/vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="../resource/vendor/angular-material.min.js"></script>  
	<script type="text/javascript" src="../resource/1.js"></script>
</body>
</html>