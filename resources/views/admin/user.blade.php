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
                <button type="button" class="btn btn-primary btn-insert" >Thêm</button>
            </div>
            <hr>
            <div class="insert-user">
                <form method="post" id="form-add-user">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="form-label">Tên tài khoản</label>
                        <input id="username" name="username" type="text" placeholder="Nhập tên tài khoản" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                        <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu"
                               type="password" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Họ tên</label>
                        <input id="name" name="name" type="text" placeholder="Nguyễn Văn A" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text" placeholder="email@domain.com" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input id="phone" name="phone" type="number" placeholder="0123456789" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="birthday" class="form-label">Ngày tháng năm sinh</label>
                        <input id="birthday" name="birthday" type="text" placeholder="VD: username" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="form-label">Ảnh đại diện</label>
                        <input id="avatar" name="avatar" type="file" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <button class="btn btn-primary btn-submit-user">Lưu</button>
                </form>
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
                        <th></th>
                        <th>Username</th>
{{--                        <th>Password</th>--}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th></th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                @foreach($users->data as $u)
                    <tr>
                        <th scope="row">{{ $u->id }}</th>
                        <td>{{ $u->username }}</td>
{{--                        <td>{{ $u->password }}</td>--}}
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>{{ $u->birthday }}</td>
                        <td><a href="{{ route('user.detail', $u->id) }}"><b>Sửa</b></a></td>
                        {{--<td><i class="fa fa-pencil"><b ng-click="showUpdate({{$u->id}})">Sửa</b></i></td>--}}
                        {{--<td><i class="fa fa-pencil"><a href="{{url('admin/user')}}">Xóa</a></i></td>--}}
                        <td>
                            <form action="{{ route('user.delete', $u->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Xóa"/>
                                <!-- <i class="fa fa-pencil"></i> -->
                                {{--<i class="fa fa-pencil"><a href="{{ route('user.delete', $u->id) }}">Xóa</a></i>--}}
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
<script type="text/javascript" src="{{ asset('js/handle.js') }}"></script>
<script>
    Validator({
        form: '#form-add-user',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name', 'Vui lòng nhập tên đầy đủ của bạn'),
            Validator.isRequired('#email', 'Vui lòng nhập email'),
            Validator.isEmail('#email'),
            Validator.minLength('#password', 6),
            Validator.isRequired('#password_confirmation'),
            Validator.isConfirmed('#password_confirmation', function () {
                return document.querySelector('#form-add-user #password').value
            }, 'Mật khẩu nhập lại không chính xác'),
            // Validator.isRequired('input[name="gender"]', 'Vui lòng chọn giới tính'),
            // Validator.isRequired('input[name="language"]', 'Vui lòng chọn ngôn ngữ'),
            // Validator.isRequired('#province', 'Vui lòng chọn Tỉnh/TP'),
            Validator.isRequired('#avatar', 'Vui lòng chọn ảnh đại diện'),
        ],
        onSubmit: function(data) {
            // Call API
            console.log(data)
        }
    })
</script>
@endsection
