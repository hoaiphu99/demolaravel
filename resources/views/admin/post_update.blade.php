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
                    <textarea type="text" class="form-control" id="nd" placeholder="Enter Content" name="content" required>{{$post->content}}</textarea>
                    <!-- <textarea class="form-control" id="nd" rows="5" placeholder="write something" name="content" value="{{$post->content}}" required="required"></textarea> -->
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
                </div>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="uname">Người Đăng:</label>
                        <select class="custom-select custom-select-sm ml-2" style="width: 50%;" name="user_id" aria-label=".form-select-sm example" required>
                            <option value="" selected>--- Người đăng ---</option>
                            @if(count($dropDownUser))
                                @foreach($dropDownUser as $u)
                                    <option value="{{ $u->id }}" {{ $post->user->id === $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                                @endforeach
                            @endif
                        </select>
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
