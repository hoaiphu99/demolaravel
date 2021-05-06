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
                <button type="button" class="btn btn-primary" ng-click="show()">Thêm</button>
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
                        <th>Username</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr ng-show="!show">
                        <form action="{{ route('user.create') }}" method="post">
                            @csrf
                            <td><input type="text" class="form-control" name="username"></td>
                            <td><input type="text" class="form-control" name="password"></td>
                            <td><input type="text" class="form-control" name="name"></td>
                            <td><input type="text" class="form-control" name="email"></td>
                            <td><input type="text" class="form-control" name="phone"></td>
                            <td><input type="text" class="form-control" name="birthday"></td>
                            <td><i class="fa fa-pencil"><button class="btn btn-primary" type="submit">Lưu</button></i></td>
                        </form>

                    </tr>
                </thead>
                <tbody>
                @foreach($users->data as $u)
                    <tr>
                        <th scope="row">{{ $u->id }}</th>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->password }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>{{ $u->birthday }}</td>
                        <td><i class="fa fa-pencil"><b ng-click="showUpdate({{$u->id}})">Sửa</b></i></td>
                        <td><i class="fa fa-pencil"><a href="{{url('admin/user')}}">Xóa</a></i></td>
                    </tr>
                @endforeach

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
