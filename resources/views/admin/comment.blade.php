@extends('admin.master')
@section('title', 'Comment')
@section('content')

<!-- Page-header start -->
<div  ng-controller="MyController">
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Quản lý Comment</h4>
                </div>
            </div>
            <hr>
            <!-- <div>
                <button type="button" class="btn btn-primary" ng-click="show1()">Thêm</button>
            </div> -->
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{url('admin/dashboard')}}">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('admin/comment')}}">Comment</a></li>
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
                        <th>Content</th>
                        <th>User_id</th>
                        <th>Post_id</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr ng-show="!show">
                        <form action="{{ route('comment.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <td></td>
                            <td><input type="text" class="form-control" name="content"></td>
                            <td><input type="text" class="form-control" name="user_id"></td>
                            <td><input type="text" class="form-control" name="post_id"></td>
                            <td><i class="fa fa-pencil"><button class="btn btn-primary" type="submit">Lưu</button></i></td>
                        </form>
                    </tr>
                </thead>
                <tbody>
                @foreach($comments->data as $m)
                    <tr>
                        <th scope="row">{{ $m->id }}</th>
                        <td>{{ $m->content }}</td>
                        <td>{{ $m->user_id->id }}</td>
                        <td>{{ $m->post_id->id }}</td>
                        <td><i class="fa fa-pencil"><b ng-click="showUpdate({{$m->id}})">Sửa</b></i></td>
                        {{--<td><i class="fa fa-pencil"><a href="{{ route('comment.delete', $m->id) }}">Xóa</a></i></td>--}}
                        <td>
                        <form action="{{ route('comment.delete', $m->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <i class="fa fa-pencil"><input class="btn btn-danger" type="submit" value="Xóa"/></i>
                            {{--<i class="fa fa-pencil"><a href="{{ route('comment.delete', $m->id) }}">Xóa</a></i>--}}
                        </form>
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