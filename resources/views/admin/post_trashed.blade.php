@extends('admin.master')
@section('title', 'Thùng rác')
@section('content')

    <div class="text-right mb-4">
        <a class="btn btn-outline-secondary" href="{{ route('admin.post') }}" role="button">Danh sách bài đăng</a>
    </div>
    <!-- DataTales User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bài đăng đã xóa</h6>
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
                            <th>Thời gian xóa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($posts as $p)
                            <tr data-id="{{ $p->id }}">
                                <th scope="row">{{ $p->id }}</th>
                                <th style="width: 30%;">{{ $p->content }}</th>
                                <td><img src="{{ $p->image }}" alt="" style="width: 50%; height: auto;"></td>
                                <td>{{ $p->user->name }}</td>
                                <td>{{ $p->deleted_at }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary" onclick="restorePost({{ $p->id }})">Khôi phục
                                        <i class="fas fa-redo"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger" onclick="forceDeletePost({{ $p->id }})">Xóa vĩnh viễn
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
                    Validator.isRequired('#content', 'Chưa nhập nội dung'),
                    Validator.isRequired('#user_id', 'Chưa chọn người đăng'),
                    Validator.isRequired('#image', 'Vui lòng chọn ảnh để đăng'),
                ],
                onSubmit: function(data) {
                    createPost(data)
                    console.log(data)
                }
            })
        })
    </script>

@endsection
