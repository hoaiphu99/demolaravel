@extends('admin.master')
@section('title', 'Bài đăng')
@section('content')

    <div>
        <button type="button" class="btn btn-primary btn-insert">Thêm</button>
    </div>
    <hr>
    <div class="insert-form">
        <div class="card mb-2" style="width: 50%;">
            <div class="card-body form-update">
                <form method="post" id="form-add">
                    @csrf
                    <div class="form-group">
                        <label for="content" class="form-label">Nội dung bài đăng</label>
                        <textarea id="content" name="content" type="text" value="" placeholder="Nhập nội dung" class="form-control"></textarea>
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Người Đăng:</label>
                        <select class="custom-select custom-select-sm ml-2" style="width: 50%;" id="user_id" name="user_id" aria-label=".form-select-sm example" required>
                            <option value="" selected>--- Người đăng ---</option>
                            @if(count($dropDownUser))
                                @foreach($dropDownUser as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Chọn ảnh</label>
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
    <!-- DataTales User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách bài đăng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Tác giả</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($posts as $p)
                            <tr>
                                <th scope="row">{{ $p->id }}</th>
                                <th >{{ $p->content }}</th>
                                <td><img src="{{ $p->image }}" alt="" height="100" width="100"></td>
                                <td>{{ $p->user->name }}</td>
                                <td><a href="{{ route('post.detail', $p->id) }}"><i class="fas fa-edit"></i></a></td>
                                <td><i class="fas fa-trash" style="cursor: pointer; color: red;"
                                       onclick="deletePost({{ $p->id }})"></i></td>
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
        })
    </script>

@endsection
