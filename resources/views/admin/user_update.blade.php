@extends('admin.master')
@section('title', 'Chỉnh sửa thông tin user')
@section('content')

    <div>
        <a href="{{ route('admin.user') }}" type="button" class="btn btn-primary btn-sm mb-3" >Trở về</a>
    </div>
    <div class="card mb-2" style="width: 50%;">
        <div class="card-body form-update">
            @foreach($users->data as $u)
                <form method="post" id="form-add">
                    @csrf
                    <div class="form-group">
                        <label for="id" class="form-label">ID</label>
                        <input id="id" name="id" type="text" value="{{$u->id}}" disabled class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Tên tài khoản</label>
                        <input id="username" name="username" type="text" value="{{$u->username}}" disabled class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input id="password" name="password" type="text" value="{{$u->password}}" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Họ tên</label>
                        <input id="name" name="name" type="text" value="{{$u->name}}" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text" value="{{$u->email}}" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input id="phone" name="phone" type="number" value="{{$u->phone}}" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="birthday" class="form-label">Ngày tháng năm sinh</label>
                        <input id="birthday" name="birthday" type="text" value="{{$u->birthday}}" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="form-label">Ảnh đại diện</label>
                        <br>
                        <img class="update-img" src = "{{ $u->avatar }}" alt = "" height="200" width="200">
                        <input id="avatar" name="avatar" type="file" class="form-control">
                        <input id="prevAvatar" name="prevAvatar" type="text" value="{{$u->avatar}}" hidden class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <button class="btn btn-primary btn-submit-form">Lưu</button>
                    <a href="{{ route('admin.user') }}" class="btn btn-danger btn-cancel-form">Hủy</a>
                </form>
            @endforeach
        </div>
    </div>

    <script>
    //Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets/user/js/main.min.js')}}"></script>
    <script src="{{asset('assets/user/js/script.js')}}"></script>

    <script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script>
        Validator({
            form: '#form-add',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#name', 'Vui lòng nhập tên đầy đủ của bạn'),
                Validator.isRequired('#email', 'Vui lòng nhập email'),
                Validator.isEmail('#email'),
                Validator.minLength('#password', 6),
                // Validator.isRequired('#avatar', 'Vui lòng chọn ảnh đại diện'),
            ],
            onSubmit: function(data) {
                updateUser(data)
                console.log(data)
            }
        })
    </script>
@endsection
