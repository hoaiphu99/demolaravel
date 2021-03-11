<!DOCTYPE html>
<html lang="en"  >
<head>
    <title> Document  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/vendor/bootstrap.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/vendor/angular-material.min.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/vendor/font-awesome.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/1.css">
</head>
<body ng-app="myApp" ng-controller="MyController">

<div class="inra">
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Hello, admin!</h1> 
            <p class="lead">User manager</p>
            <hr class="my-4">
            <ul>
                <div ng-repeat="u in user" ng-init="u.hienra=false">
                    <div class="card bg-primary|secondary|success|danger|warning|info|light|dark border-primary|secondary|success|danger|warning|info|light|dark sua" ng-show="u.hienra">
                        <div class="card-header">
                            Thông tin về <input type="text" class="form-control" ng-model="u.Name">
                        </div>
                        <div class="card-body pl-1 pr-1 pt-1 pb-1">
                            <input type="hidden" class="form-control" ng-model="u.id"> <br>
                            <b>Năm sinh: </b> <input type="text" class="form-control" ng-model="u.Birdthday"> <br>
                            <b>Facebook: </b> <input type="text" class="form-control" ng-model="u.Facebook"> <br>
                            <b>Điện thoại: </b> <input type="text" class="form-control" ng-model="u.Phone"> <br>
                            <b class="float-xs-center btn btn-danger btn-block" ng-click="update(u)">Lưu</b>
                        </div>
                    </div>
                    <div class="card bg-primary|secondary|success|danger|warning|info|light|dark border-primary|secondary|success|danger|warning|info|light|dark" ng-show="!u.hienra">
                        <div class="card-header">
                            <b class="float-xs-right"><i class="fa fa-pencil" ng-click="sua(u)"></i></b>
                            Thông tin về {{u.Name}}</div>
                        <div class="card-body text-primary|secondary|success|danger|warning|info|light|dark pl-1 pr-1 pt-1 pb-1">
                            <b>Năm sinh: </b> <i>{{u.Birdthday}}</i> <br>
                            <b>Facebook: </b> <i>{{u.Facebook}}</i> <br>
                            <b>Điện thoại: </b> <i>{{u.Phone}}</i> <br>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?php echo URL::to('/'); ?>/vendor/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo URL::to('/'); ?>/vendor/angular-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo URL::to('/'); ?>/vendor/angular-animate.min.js"></script>
<script type="text/javascript" src="<?php echo URL::to('/'); ?>/vendor/angular-aria.min.js"></script>
<script type="text/javascript" src="<?php echo URL::to('/'); ?>/vendor/angular-messages.min.js"></script>
<script type="text/javascript" src="<?php echo URL::to('/'); ?>/vendor/angular-material.min.js"></script>
<script type="text/javascript" src="<?php echo URL::to('/'); ?>/1.js"></script>
</body>
</html>
