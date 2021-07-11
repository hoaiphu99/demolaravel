@extends('admin.master')
@section('title', 'Lượt thích bài đăng')
@section('content')
    <div>
        <a href="{{ route('admin.post') }}" type="button" class="btn btn-primary btn-sm mb-3" >Trở về</a>
    </div>

    <div class="text-center">
        <img src="{{ $likes[0]->post->image }}" class="rounded" alt="{{ $likes[0]->post->content }}" style="width: 10%; height: auto;">
    </div>
    <hr>
    @foreach($likes as $l)
        <div class="card mb-3" style="max-width: 50%; height: auto;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $l->user->avatar }}" alt="{{ $l->user->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $l->user->name }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
@endsection
