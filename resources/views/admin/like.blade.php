@extends('admin.master')
@section('title', 'Lượt thích')
@section('content')

    <div>
        <button type="button" class="btn btn-primary btn-insert">Thêm</button>
    </div>
    <hr>
    <div class="insert-form">
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
                <label for="avatar" class="form-label">Ảnh đại diện</label>
                <input id="avatar" name="avatar" type="file" class="form-control">
                <span class="form-message"></span>
            </div>
            <button class="btn btn-primary btn-submit-form">Lưu</button>
            <button class="btn btn-danger btn-cancel-form" onclick="hideForm()">Hủy</button>
        </form>
    </div>
    <!-- DataTales User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách lượt thích</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên Người Dùng</th>
                            <th>ID Bài Đăng</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($likes->data as $l)
                            <tr>
                                <th scope="row">{{ $l->id }}</th>
                                <td>{{ $l->user->name }}</td>
                                <td>{{ $l->post->id }}</td>
                                <!-- <td><i class="fa fa-pencil"><b ng-click="showUpdate({{ $l->id }})">Sửa</b></i></td> -->
                                <td><b ng-click="showUpdate({{ $l->id }})">Sửa</b></td>
                                <td>
                                    <form action="{{ route('like.delete', $l->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger" type="submit" value="Xóa" />
                                        <!-- <i class="fa fa-pencil"><input class="btn btn-danger" type="submit" value="Xóa"/></i> -->
                                        {{-- <i class="fa fa-pencil"><a href="{{ route('like.delete', $l->id) }}">Xóa</a></i> --}}
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

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    {{-- Validator --}}
    <script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
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
                Validator.isConfirmed('#password_confirmation', function() {
                    return document.querySelector('#form-add-user #password').value
                }, 'Mật khẩu nhập lại không chính xác'),
                // Validator.isRequired('input[name="gender"]', 'Vui lòng chọn giới tính'),
                // Validator.isRequired('input[name="language"]', 'Vui lòng chọn ngôn ngữ'),
                // Validator.isRequired('#province', 'Vui lòng chọn Tỉnh/TP'),
                Validator.isRequired('#avatar', 'Vui lòng chọn ảnh đại diện'),
            ],
            onSubmit: function(data) {
                postUser(data)
                console.log(data)
            }
        })
    </script>

@endsection
