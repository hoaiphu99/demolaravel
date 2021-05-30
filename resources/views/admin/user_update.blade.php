@extends('admin.master')
@section('title', 'User_Update')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <title>Bootstrap Example</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
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

        <div class = "card text-center">
            <div class = "card-header">
                <h2>Form Update</h2>
                <!-- <p>In this example, we use <code>.needs-validation</code>, which will add the validation effect AFTER the form has been submitting (if there's anything missing).</p>
                <p>Try to submit this form before filling out the input fields, to see the effect.</p> -->
            </div>
            <div class="card-body">
                @foreach($users->data as $u)
                <form action="{{ route('user.update', $u->id) }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label>Họ và Tên:</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$u->name}}" required>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" value="{{$u->username}}" required readonly>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="{{$u->password}}" required readonly>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="mail">Email:</label>
                        <input type="email" class="form-control" id="mail" placeholder="Enter email" name="email" value="{{$u->email}}" required >
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="sdt">Phone:</label>
                        <input type="number" class="form-control" id="sdt" placeholder="Enter phone" name="phone" value="{{$u->phone}}" required >
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="ngaysinh">Birthday:</label>
                        <input type="text" class="form-control" id="ngaysinh" placeholder="Enter birthday" name="birthday" value="{{$u->birthday}}" required >
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <br>
                        <img src = "{{ $u->avatar }}" alt = "" height="200" width="200">
                    </div>
                    <!-- <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                    </div> -->
                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    <script>
    // Disable form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.querySelectorAll('.needs-validation');
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>
</body>
</html>

<!-- Page-header start -->
<!-- <div  ng-controller="MyController">
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
</div> -->
<!-- Page-header end -->

<!-- Page-body start -->
<!-- <div class="page-body">
    <div class="card">
        <div class="d-flex justify-content-between">
            <div class="mother-grid-inner">
                <div class="inner-block">
                    <div class="inbox"> -->
                        <!-- <h2>Cập Nhật Người Dùng</h2> -->
                        <!-- <div class="col-md-12 compose-right">
                            <div class="inbox-details-default">
                                {{--<div class="inbox-details-heading">Form</div>--}}
                                <div class="inbox-details-body">
                                    {{--<div class="alert alert-info">${message}  </div>--}}
                                    @foreach($users->data as $u)
                                    <form action="{{ route('user.update', $u->id) }}" class="com-mail" method="post">
                                        @csrf -->
                                        <!-- <label>Id</label>
                                        <input type="text" name="id" value="{{$u->id}}" readonly/> -->
                                        <!-- <label>Họ và tên</label>
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
                                        <label>Avatar</label> -->
                                        <!-- Combobox -->
                                        <!-- <img src = "{{ $u->avatar }}" alt = "" height="200" width="200"> -->
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
                                        <!-- <br>
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
    </div> -->
<!-- Page-body end -->
<!-- </div> -->

@endsection