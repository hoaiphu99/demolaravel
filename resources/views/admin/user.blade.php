@extends('admin.master')
@section('title', 'User')
@section('content')

    <div>
        <button type="button" class="btn btn-primary btn-insert" >Thêm</button>
    </div>
    <hr>
    <div class="insert-form">
        <div class="card mb-2" style="width: 50%;">
            <div class="card-body form-update">
                <form method="post" id="form-add">
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
                        <div class="custom-file">
                            <input name="avatar" type="file" class="custom-file-input" id="avatar" onchange="showImage()">
                            <label class="custom-file-label" for="avatar">Chọn ảnh đại diện</label>
                        </div>
                        <span class="form-message"></span>
                    </div>
                    <div>
                        <img class="mt-2 mb-2" id="img-avatar" src="" alt="">
                    </div>
                    <button class="btn btn-primary btn-submit-form">Lưu</button>
                    <button class="btn btn-danger btn-cancel-form" onclick="hideForm()">Hủy</button>
                </form>
            </div>
        </div>
    </div>
    <div class="text-right mb-4">
        <a class="btn btn-outline-secondary" href="{{ route('user.trashed') }}" role="button">Thùng rác (<span id="trashed">{{ $countDeleted }}</span>)</a>
    </div>
    <!-- DataTales User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Ngày sinh</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($users as $u)
                            <tr data-id="{{ $u->id }}">
                                <th scope="row">{{ $u->id }}</th>
                                <td>{{ $u->username }}</td>
                                {{-- <td>{{ $u->password }}</td> --}}
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->phone }}</td>
                                <td>{{ $u->birthday }}</td>
                                <td><a href="{{ route('user.detail', $u->id) }}"><i class="fas fa-edit"></i></a> Sửa</td>
                                <td><i class="fas fa-trash" style="cursor: pointer; color: red;"
                                        onclick="deleteUser({{ $u->id }})"></i> Xóa</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Validator --}}
    <script>

        document.addEventListener('DOMContentLoaded', () => {
            Validator({
                form: '#form-add',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#name', 'Vui lòng nhập tên đầy đủ của bạn'),
                    Validator.isRequired('#email', 'Vui lòng nhập email'),
                    Validator.isEmail('#email'),
                    Validator.minLength('#password', 6),
                    Validator.isRequired('#password_confirmation'),
                    Validator.isConfirmed('#password_confirmation', function() {
                        return document.querySelector('#form-add #password').value
                    }, 'Mật khẩu nhập lại không chính xác'),
                    // Validator.isRequired('input[name="gender"]', 'Vui lòng chọn giới tính'),
                    // Validator.isRequired('input[name="language"]', 'Vui lòng chọn ngôn ngữ'),
                    // Validator.isRequired('#province', 'Vui lòng chọn Tỉnh/TP'),
                    Validator.isRequired('#avatar', 'Vui lòng chọn ảnh đại diện'),
                ],
                onSubmit: function(data) {
                    createUser(data)
                    console.log(data)
                }
            })

        })

    </script>

@endsection
