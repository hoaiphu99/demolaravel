@extends('admin.master')
@section('title', 'Thùng rác')
@section('content')

    <div class="mb-4">
        <a class="btn btn-outline-primary" href="{{ route('admin.comment') }}" role="button">Danh sách bình luận</a>
    </div>
    <!-- DataTales User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bình luận đã xóa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nội Dung</th>
                            <th>Người Dùng</th>
                            <th>Bài Đăng</th>
                            <th>Thời gian xóa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($comments as $cmt)
                            <tr data-id="{{ $cmt->id }}">
                                <th scope="row">{{ $cmt->id }}</th>
                                <td style="width: 50%; ">{{ $cmt->content }}</td>
                                <td>{{ $cmt->user->username }}</td>
                                <td><img src="{{ $cmt->post->image }}" alt="" style="width: 50%; height: auto;"></td>
                                <td>{{ $cmt->deleted_at }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary" onclick="restoreComment({{ $cmt->id }})">Khôi phục
                                        <i class="fas fa-redo"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger" onclick="forceDeleteComment({{ $cmt->id }})">Xóa vĩnh viễn
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



@endsection
