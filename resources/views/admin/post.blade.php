@extends('admin.master')
@section('title', 'Bài đăng')
@section('content')

<!-- Page-header start -->
<div  ng-controller="PostController">
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Quản lý bài đăng</h4>
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
                <li class="breadcrumb-item"><a href="{{url('admin/post')}}">Bài đăng</a></li>
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
{{--                        <th>ID</th>--}}
                        <th>Nội dung</th>
                        <th>Chọn hình ảnh</th>
                        <th>Tác giả</th>
                        <th></th>
                        <th></th>
                    </tr>
{{--                     <tr ng-show="!show" ng-init="p">--}}
{{--                        <th scope="row">{{ p->id }}</th>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->title"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->description"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->image"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->user_id"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->cate_id"></td>--}}
{{--                        <td><i class="fa fa-pencil"><a ng-click="create(p)" href="{{url('admin/post')}}">Lưu</a></i></td>--}}
{{--                    </tr> --}}
                </thead>
                <tbody>
                <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <td><input type="text" class="form-control" name="content"></td>
                    <td><input type="file" class="form-control" name="image"></td>
                    <td><input type="text" class="form-control" name="user_id"></td>
                    <td><i class="fa fa-pencil"><button class="btn btn-primary" type="submit">Lưu</button></i></td>
                </form>
                @foreach($posts->data as $p)
                    <tr>
                        <th scope="row">{{ $p->content }}</th>
                        <td><img src = "{{ $p->image }}" alt = ""></td>
                        <td>{{ $p->user->name }}</td>
                        <td><b ng-click="showUpdate({{$p->id}})">Sửa</b></td>
                        <!-- <td><i class="fa fa-pencil"><b ng-click="showUpdate({{$u->id}})">Sửa</b></i></td> -->
                        <!-- <td><i class="fa fa-pencil"><a href="{{url('admin/user')}}">Xóa</a></i></td> -->
                        <td>
                            <form action="{{ route('post.delete.$p->id', $p->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Xóa"/>
                                <!-- <i class="fa fa-pencil"></i> -->
                                {{--<i class="fa fa-pencil"><a href="{{ route('post.delete.$p->id', $p->id) }}">Xóa</a></i>--}}
                            </form>
                        </td>
                    </tr>
                @endforeach
{{--                    @foreach ($posts as $p)--}}
{{--                    <tr>--}}
{{--                        <th scope="row">{{ $p->id }}</th>--}}
{{--                        <td>{{ $p->title }}</td>--}}
{{--                        <td>{{ $p->description }}</td>--}}
{{--                        <td>{{ $p->image }}</td>--}}
{{--                        <td>{{ $p->user->name }}</td>--}}
{{--                        <td>{{ $p->category->name }}</td>--}}
{{--                        <td><i class="fa fa-pencil"><b ng-click="show(p)">Sửa</b></i></td>--}}
{{--                        <td><i class="fa fa-pencil"><a ng-click="delete(p)" href="{{url('admin/post')}}">Xóa</a></i></td>--}}
{{--                    </tr>--}}
{{--                    @endforeach--}}

{{--                     <tr ng-show="p->show">--}}
{{--                        <th scope="row">{{ p->id }}</th>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->title"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->description"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->image"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->user_id"></td>--}}
{{--                        <td><input type="text" class="form-control" ng-model="p->cate_id"></td>--}}
{{--                        <td><i class="fa fa-pencil"><b ng-click="update(p)">Lưu</b></i></td>--}}
{{--                    </tr> --}}
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
