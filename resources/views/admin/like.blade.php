@extends('admin.master')
@section('title', 'Like')
@section('content')

<!-- Page-header start -->
<div  ng-controller="MyController">
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Quản lý Like</h4>
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
                <li class="breadcrumb-item"><a href="{{url('admin/like')}}">Like</a></li>
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
                        <th></th>
                        <th>Tên Người Dùng</th>
                        <th>Bài Đăng</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <!-- <tr ng-show="!show">
                        <form action="{{ route('like.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <td></td>
                            <td><input type="text" class="form-control" name="user_id"></td>
                            <td><input type="text" class="form-control" name="post_id"></td>
                            <td><i class="fa fa-pencil"><button class="btn btn-primary" type="submit">Lưu</button></i></td>
                        </form>
                    </tr> -->
                </thead>
                <tbody>
                @foreach($likes->data as $l)
                    <tr>
                        <th scope="row">{{ $l->id }}</th>
                        <td>{{ $l->user->name }}</td>
                        <td>{{ $l->post->content }}</td>
                        <!-- <td><i class="fa fa-pencil"><b ng-click="showUpdate({{$l->id}})">Sửa</b></i></td> -->
                        <td><b ng-click="showUpdate({{$l->id}})">Sửa</b></td>
                        <td>
                            <form action="{{ route('like.delete', $l->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <i class="fa fa-pencil"><input class="btn btn-danger" type="submit" value="Xóa"/></i>
                                {{--<i class="fa fa-pencil"><a href="{{ route('like.delete', $l->id) }}">Xóa</a></i>--}}
                            </form>
                        <!-- @method('DELETE')
                        @csrf
                        <i class="fa fa-pencil"><a href="{{ route('like.delete', $l->id) }}" method="post">Xóa</a></i> -->
                        </td>
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
