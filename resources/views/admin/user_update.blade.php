@extends('admin.master')
@section('title', 'User_Update')
@section('content')

<!-- Page-header start -->
<div  ng-controller="MyController">
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Cập Nhật User</h4>
                </div>
            </div>
            <hr>
            {{--<div>--}}
                {{--<button type="button" class="btn btn-primary btn-insert" >Thêm</button>--}}
            {{--</div>--}}
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{url('admin/dashboard')}}">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('admin/user_update')}}">User</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- Page-header end -->

<!-- Page-body start -->
<div class="page-body">
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <div class="inner-block">
                    <div class="inbox">
                        <h2>Cập Nhật Người Dùng</h2>
                        <div class="col-md-12 compose-right">
                            <div class="inbox-details-default">
                                {{--<div class="inbox-details-heading">Form</div>--}}
                                <div class="inbox-details-body">
                                    {{--<div class="alert alert-info">${message}  </div>--}}
                                    @foreach($users->data as $u)
                                    <form action="{{ route('user.update', $u->id) }}" class="com-mail" method="post">
                                        @csrf
                                        <!-- <label>Id</label>
                                        <input type="text" name="id" value="{{$u->id}}" readonly/> -->
                                        <label>Họ và tên</label>
                                        <input type="text" name="name" value="{{$u->name}}" required="required" />
                                        <label>Username</label>
                                        <input type="text" name="username" value="{{$u->username}}" readonly />
                                        <label>Password</label>
                                        <input type="text" name="password" value="{{$u->password}}" readonly />
                                        <br>
                                        <br>
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{$u->email}}" required="required"/>
                                        <br>
                                        <br>
                                        <label>Phone</label>
                                        <input type="number" name="phone" value="{{$u->phone}}" required="required"/>
                                        <br>
                                        <br>
                                        <label>Birthday</label>
                                        <input type="text" name="birthday" value="{{$u->birthday}}" required="required"/>
                                        <br>
                                        <label>Avatar</label>
                                        <!-- Combobox -->
                                        <img src = "{{ $u->avatar }}" alt = "" height="200" width="200">
                                        {{--<form class="edit-phto">--}}
                                            {{--<i class="fa fa-camera-retro"></i>--}}
                                            {{--<label class="fileContainer">--}}
                                                <!-- Edit Display Photo -->
                                                {{--<input type="file"/>--}}
                                            {{--</label>--}}
                                        {{--</form>--}}
                                        <!-- <div class="feature-photo">
                                            <div class="container-fluid">
                                                <div class="row merged">
                                                    <div class="col-lg-2 col-sm-3">
                                                        <div class="user-avatar">
                                                            <figure>
                                                                {{--<img src="{{$u->avatar}}" alt="" height="200" width="200">--}}
                                                                <form class="edit-phto">
                                                                    <i class="fa fa-camera-retro"></i>
                                                                    <label class="fileContainer">
                                                                        <img src="{{$u->avatar}}" alt="" height="200" width="200">
                                                                        Edit Display Photo
                                                                        <input type="file"/>
                                                                    </label>
                                                                </form>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <br>
                                        <br>
                                        <button class="btn btn-success" type="submit" value="Cập Nhật">Cập nhật</button>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Page-body end -->
</div>

@endsection