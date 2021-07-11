@extends('admin.master')
@section('title', 'Bình luận bài đăng')
@section('content')
    <div>
        <a href="{{ route('admin.post') }}" type="button" class="btn btn-primary btn-sm mb-3" >Trở về</a>
    </div>

    <div class="text-center">
        <img src="{{ $post->image }}" class="rounded" alt="{{ $post->content }}" style="width: 10%; height: auto;">
    </div>
    <hr>
    @if(count($comments))
        @foreach($comments as $cmt)
            <div id="comment">
                <div class="card">
                    <h5 class="card-header">{{ $cmt->user->name }}</h5>
                    <div class="card-body">
                        <p class="card-text">{{ $cmt->content }}</p>
                        <hr>
                        <a onclick="deleteComment({{ $cmt->id }})" class="btn btn-primary btn-sm">
                            <i class="fas fa-trash" style="cursor: pointer;"></i>
                            Xóa
                        </a>
                    </div>
                </div>
                <br>
            </div>
        @endforeach
    @else
        <h4>Không có bình luận nào.</h4>
    @endif

@endsection
