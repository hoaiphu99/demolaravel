@extends('admin.master')
@section('title', 'Thùng rác')
@section('content')

    <div class="mb-4">
        <a class="btn btn-outline-primary" href="{{ route('admin.user') }}" role="button">Danh sách người dùng</a>
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
                            <th>Thời gian xóa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($users as $u)
                            <tr data-id="{{ $u->id }}">
                                <th scope="row">{{ $u->id }}</th>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->deleted_at }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary" onclick="restoreUser({{ $u->id }})">Khôi phục
                                        <i class="fas fa-redo"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger" onclick="forceDeleteUser({{ $u->id }})">Xóa vĩnh viễn
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </td>
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
