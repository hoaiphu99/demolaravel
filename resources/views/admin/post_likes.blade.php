@extends('admin.master')
@section('title', 'Lượt thích bài đăng')
@section('content')
    <div>
        <a href="{{ route('admin.post') }}" type="button" class="btn btn-primary btn-sm mb-3" >Trở về</a>
    </div>

    <div class="text-center">
        <img src="{{ $post->image }}" class="rounded" alt="{{ $post->content }}" style="width: 10%; height: auto;">
    </div>
    <hr>
    @foreach($likes as $l)
        <div class="" style="width: 50%; height: auto;">
            <a href="{{ route('user.detail', $l->user->id) }}" style="text-decoration: none;">
                <img src="{{ $l->user->avatar }}" alt="{{ $l->user->name }}" style="width:50px; height: 50px; border-radius: 50%;">
                <span>{{ $l->user->name }}</span>
            </a>
        </div>
        <hr>
    @endforeach
@endsection
