@extends('admin.master')
@section('title', 'Bình luận')
@section('content')


    <!-- DataTales User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
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
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        @foreach ($comments->data as $cmt)
                            <tr>
                                <th scope="row">{{ $cmt->id }}</th>
                                <td style="width: 50%; ">{{ $cmt->content }}</td>
                                <td>{{ $cmt->user->username }}</td>
                                <td><img src="{{ $cmt->post->image }}" alt="" style="width: 50%; height: auto;"></td>
                                <td><a href="{{ route('comment.detail', $cmt->id) }}"><i class="fas fa-edit"></i></a> Sửa</td>
                                <td><i class="fas fa-trash" style="cursor: pointer; color: red;"
                                       onclick="deleteComment({{ $cmt->id }})"></i> Xóa</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
