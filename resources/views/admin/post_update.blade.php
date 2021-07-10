@extends('admin.master')
@section('title', 'Cập nhật bài đăng')
@section('content')

    <div>
        <a href="{{ route('admin.post') }}" type="button" class="btn btn-primary btn-sm mb-3" >Trở về</a>
    </div>
    <div class = "card mb-2" style="width: 50%;">
        <div class="card-body">
            @isset($msg)
                <div>
                    <p style="color: green;">{{$msg}}</p>
                </div>
            @endisset
            <form method="post" id="form-add">
                @csrf
                <div class="form-group">
                    <label for="id" class="form-label">ID</label>
                    <input id="id" name="id" type="text" value="{{$post->id}}" disabled class="form-control">
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="content" class="form-label">Nội dung bài đăng</label>
                    <textarea id="content" name="content" type="text" value="" placeholder="Nhập nội dung" class="form-control">{{ $post->content }}</textarea>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="user_id">Người Đăng:</label>
                    <select class="custom-select custom-select-sm ml-2" style="width: 50%;" id="user_id" name="user_id" aria-label=".form-select-sm example" required>
                        <option value="" selected>--- Người đăng ---</option>
                        @if(count($dropDownUser))
                            @foreach($dropDownUser as $u)
                                <option value="{{ $u->id }}" {{ $post->user->id === $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="image">Hình Ảnh:</label>
                    <br>
                    <img src="{{$post->image}}" alt="" height="300" width="300">
                    <br>
                </div>
                <button type="submit" class="btn btn-primary btn-submit-form">Cập Nhật</button>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Validator({
                form: '#form-add',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#content', 'Chưa nhập nội dung'),
                    Validator.isRequired('#user_id', 'Chưa chọn người đăng'),
                ],
                onSubmit: function(data) {
                    updatePost(data)
                    console.log(data)
                }
            })
        })
    </script>
@endsection
