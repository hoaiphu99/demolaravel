@extends('admin.master')
@section('title', 'Bình luận bài đăng')
@section('content')
    <div>
        <a href="{{ route('admin.post') }}" type="button" class="btn btn-primary btn-sm mb-3" >Trở về</a>
    </div>

    <div class="text-center">
        <img src="{{ $comments[0]->post->image }}" class="rounded" alt="{{ $comments[0]->post->content }}" style="width: 10%; height: auto;">
    </div>
    <hr>
    @foreach($comments as $cmt)
    <div class="card">
        <h5 class="card-header">{{ $cmt->user->name }}</h5>
        <div class="card-body">
            <p class="card-text">{{ $cmt->content }}</p>
            <hr>
            <a href="#" class="btn btn-primary btn-sm">
                <i class="fas fa-trash" style="cursor: pointer;"></i>
                Xóa
            </a>
        </div>
    </div>
    <hr>
    @endforeach
@endsection
