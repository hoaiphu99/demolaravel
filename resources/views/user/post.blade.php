@extends('user.master')
@section('title', 'Wibu Media')
@section('content')

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            <div class="col-lg-3">

                            </div><!-- sidebar -->
                            <div class="col-lg-6">

                                <div class="loadMore">
                                    <div class="central-meta item">
                                        <div class="user-post">
                                            <div class="friend-info">
                                                <figure>
                                                    <img src="{{$post->user->avatar}}" alt="">
                                                </figure>
                                                <div class="friend-name">
                                                    <ins><a href="{{$post->user->username}}" title="">{{$post->user->name}}</a></ins>
                                                    <span>published: june,2 2018 19:PM</span>
                                                </div>
                                                <div class="post-meta">
                                                    <img src="{{$post->image}}" alt="">
                                                    <div class="we-video-info">
                                                        <ul>
                                                            <li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<i class="far fa-comments"></i>
																<ins>2.2k</ins>
															</span>
                                                            </li>
                                                            <li>
															<span class="like" data-toggle="tooltip" title="like">
																<i class="ti-heart"></i>
																<ins>2.2k</ins>
															</span>
                                                            </li>
                                                            <li class="social-media">
                                                                <div class="menu">
                                                                    <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="description">

                                                        <p>
                                                            {{$post->content}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="coment-area">
                                                <ul class="we-comet">
                                                    @foreach($comments->data as $cmt)
                                                    <li>
                                                        <div class="comet-avatar">
                                                            <img src="{{$cmt->user->avatar}}" alt="">
                                                        </div>
                                                        <div class="we-comment">
                                                            <div class="coment-head">
                                                                <h5><a href="{{route('profile.username', ['username' => $cmt->user->username])}}" title="">{{$cmt->user->username}}</a></h5>
{{--                                                                <span>1 week ago</span>--}}
                                                                <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                            </div>
                                                            <p>
                                                                {{$cmt->content}}
                                                            </p>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    <li class="post-comment">
                                                        <div class="comet-avatar">
                                                            <img src="{{session()->get('user')->avatar}}" alt="">
                                                        </div>
                                                        <div class="post-comt-box">
                                                            <form action="{{route('comment.post')}}" method="post">
                                                                @csrf
                                                                <textarea placeholder="Post your comment" name="content"></textarea>
                                                                <input name="user_id" type="hidden" value="{{session()->get('user')->id}}">
                                                                <input name="post_id" type="hidden" value="{{$post->id}}">
                                                                <div class="add-smiles">
                                                                    <button type="submit">
                                                                        <i class="fas fa-paper-plane"></i>
                                                                    </button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- centerl meta -->
                            <div class="col-lg-3">

                            </div><!-- sidebar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{--    <div class="container-fluid" data-aos="fade" data-aos-delay="500" ng-controller="MyController" >--}}
{{--        <div class="row">--}}
{{--             @foreach ($posts->data as $p)--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="image-wrap-2">--}}
{{--                        <div class="image-info">--}}
{{--                            <h2 class="mb-3">{{ $p->name }}</h2>--}}
{{--                            <a href="{{ route('post.id', ['id' => $p->id]) }}" class="btn btn-outline-white py-2 px-4">Click me</a>--}}
{{--                        </div>--}}
{{--                        <img src="{{secure_asset('{{ $p->image }}" alt="{{ $p->content }}" class="img-fluid">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--             @endforeach--}}

{{--            --}}{{-- <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Portrait</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_2.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">People</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_3.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Architecture</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_4.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Animals</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_5.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Sports</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_6.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Travel</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_7.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">People</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_3.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Architecture</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="{{secure_asset('<%  asset('assets/images/img_4.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div> --}}

{{--        </div>--}}
{{--    </div>--}}

@endsection
