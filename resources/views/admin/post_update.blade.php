@extends('admin.master')
@section('title', 'Cập nhật bài đăng')
@section('content')

    <div>
        <a href="{{ route('admin.post') }}" type="button" class="btn btn-primary btn-sm mb-3" >Trở về</a>
    </div>
    <div class = "card mb-2" style="width: 50%;">
        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nd">Nội Dung:</label>
                    <input type="text" class="form-control" id="nd" placeholder="Enter Content" name="content" value="{{$post->content}}" required/>
                    <!-- <textarea class="form-control" id="nd" rows="5" placeholder="write something" name="content" value="{{$post->content}}" required="required"></textarea> -->
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
                </div>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="uname">Người Đăng:</label>
                        <input type="text" class="form-control" id="uname" placeholder="{{$post->user->id}}" name="user_id" value="{{$post->user->name}}" required="required"/>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
                        @isset($msg)
                        <p>{{$msg}}</p>
                        @endisset
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Hình Ảnh:</label>
                    <br>
                    <img src="{{$post->image}}" alt="" height="300" width="300">
                    <br>
                </div>

                <button type="submit" class="btn btn-success">Cập Nhật</button>
            </form>

        </div>
    </div>


@endsection
