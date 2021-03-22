@extends('admin.master')
@section('title', 'User')
@section('content')

<!-- Page-header start -->
<div  ng-controller="MyController">
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Quản lý user</h4>
                </div>
            </div>
            <hr>
            <div>
                <button type="button" class="btn btn-primary" ng-click="show1()">Thêm</button>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{url('admin/dashboard')}}">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('admin/user')}}">User</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- Page-header end -->

<!-- Page-body start -->
<div class="page-body">
<!-- Hover table card start -->
<div class="card">
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr ng-show="!show" ng-init="u">
                        <th scope="row"><% u.id %></th>
                        <td><input type="text" class="form-control" ng-model="u.username"></td>
                        <td><input type="text" class="form-control" ng-model="u.password"></td>
                        <td><input type="text" class="form-control" ng-model="u.name"></td>
                        <td><input type="text" class="form-control" ng-model="u.email"></td>
                        <td><input type="text" class="form-control" ng-model="u.phone"></td>
                        <td><input type="text" class="form-control" ng-model="u.birthday"></td>
                        <td><i class="fa fa-pencil"><a ng-click="create(u)" href="{{url('admin/user')}}">Lưu</a></i></td>
                    </tr>
                </thead>
                <tbody ng-repeat="u in user" ng-init="u.show=false">
                    <tr ng-show="!u.show">
                        <th scope="row"><% u.id %></th>
                        <td><% u.username %></td>
                        <td><% u.password %></td>
                        <td><% u.name %></td>
                        <td><% u.email %></td>
                        <td><% u.phone %></td>
                        <td><% u.birthday %></td>
                        <td><i class="fa fa-pencil"><b ng-click="show(u)">Sửa</b></i></td>
                        <td><i class="fa fa-pencil"><a ng-click="delete(u)" href="{{url('admin/user')}}">Xóa</a></i></td>
                    </tr>
                    <tr ng-show="u.show">
                        <th scope="row"><% u.id %></th>
                        <td><input type="text" class="form-control" ng-model="u.username"></td>
                        <td><input type="text" class="form-control" ng-model="u.password"></td>
                        <td><input type="text" class="form-control" ng-model="u.name"></td>
                        <td><input type="text" class="form-control" ng-model="u.email"></td>
                        <td><input type="text" class="form-control" ng-model="u.phone"></td>
                        <td><input type="text" class="form-control" ng-model="u.birthday"></td>
                        <td><i class="fa fa-pencil"><b ng-click="update(u)">Lưu</b></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Hover table card end -->
</div>
<!-- Page-body end -->
</div>                    
@endsection