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
                                <aside class="sidebar static">
                                    <div class="widget">
                                        <h4 class="widget-title">Shortcuts</h4>
                                        <ul class="naves">
                                            <li>
                                                <i class="ti-clipboard"></i>
                                                <a href="newsfeed.html" title="">News feed</a>
                                            </li>
                                            <li>
                                                <i class="ti-mouse-alt"></i>
                                                <a href="inbox.html" title="">Inbox</a>
                                            </li>
                                            <li>
                                                <i class="ti-files"></i>
                                                <a href="fav-page.html" title="">My pages</a>
                                            </li>
                                            <li>
                                                <i class="ti-user"></i>
                                                <a href="timeline-friends.html" title="">friends</a>
                                            </li>
                                            <li>
                                                <i class="ti-image"></i>
                                                <a href="timeline-photos.html" title="">images</a>
                                            </li>
                                            <li>
                                                <i class="ti-video-camera"></i>
                                                <a href="timeline-videos.html" title="">videos</a>
                                            </li>
                                            <li>
                                                <i class="ti-comments-smiley"></i>
                                                <a href="messages.html" title="">Messages</a>
                                            </li>
                                            <li>
                                                <i class="ti-bell"></i>
                                                <a href="notifications.html" title="">Notifications</a>
                                            </li>
                                            <li>
                                                <i class="ti-share"></i>
                                                <a href="people-nearby.html" title="">People Nearby</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-bar-chart-o"></i>
                                                <a href="insights.html" title="">insights</a>
                                            </li>
                                            <li>
                                                <i class="ti-power-off"></i>
                                                <a href="{{route('logout')}}" title="">Logout</a>
                                            </li>
                                        </ul>
                                    </div><!-- Shortcuts -->
                                    <div class="widget">
                                        <h4 class="widget-title">Recent Activity</h4>
                                        <ul class="activitiez">
                                            <li>
                                                <div class="activity-meta">
                                                    <i>10 hours Ago</i>
                                                    <span><a href="#" title="">Commented on Video posted </a></span>
                                                    <h6>by <a href="time-line.html">black demon.</a></h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="activity-meta">
                                                    <i>30 Days Ago</i>
                                                    <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="activity-meta">
                                                    <i>2 Years Ago</i>
                                                    <span><a href="#" title="">Share a video on her timeline.</a></span>
                                                    <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- recent activites -->
                                    <div class="widget stick-widget">
                                        <h4 class="widget-title">Who's follownig</h4>
                                        <ul class="followers">
                                            <li>
                                                <figure><img src="{{secure_asset('assets/user/images/resources/friend-avatar2.jpg')}}" alt=""></figure>
                                                <div class="friend-meta">
                                                    <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                                                    <a href="#" title="" class="underline">Add Friend</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img src="{{secure_asset('assets/user/images/resources/friend-avatar4.jpg')}}" alt=""></figure>
                                                <div class="friend-meta">
                                                    <h4><a href="time-line.html" title="">Issabel</a></h4>
                                                    <a href="#" title="" class="underline">Add Friend</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img src="{{secure_asset('assets/user/images/resources/friend-avatar6.jpg')}}" alt=""></figure>
                                                <div class="friend-meta">
                                                    <h4><a href="time-line.html" title="">Andrew</a></h4>
                                                    <a href="#" title="" class="underline">Add Friend</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img src="{{secure_asset('assets/user/images/resources/friend-avatar8.jpg')}}" alt=""></figure>
                                                <div class="friend-meta">
                                                    <h4><a href="time-line.html" title="">Sophia</a></h4>
                                                    <a href="#" title="" class="underline">Add Friend</a>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><img src="{{secure_asset('assets/user/images/resources/friend-avatar3.jpg')}}" alt=""></figure>
                                                <div class="friend-meta">
                                                    <h4><a href="time-line.html" title="">Allen</a></h4>
                                                    <a href="#" title="" class="underline">Add Friend</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- who's following -->
                                </aside>
                            </div><!-- sidebar -->
                            <div class="col-lg-6">
                                <div class="central-meta">
                                    <div class="new-postbox">
                                        <figure>
                                            <img src="{{session()->get('user')->avatar}}" alt="">
                                        </figure>
                                        <div class="newpst-input">
                                            <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <textarea rows="2" placeholder="write something" name="content"></textarea>
                                                <div class="attachments">
                                                    <ul>
                                                        <li>
                                                            <i class="ti-image"></i>
                                                            <label class="fileContainer">
                                                                <input type="file" name="image">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <button type="submit">Đăng</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- add post new box -->
                                <div class="loadMore">
                                    @foreach($posts->data as $p)
                                    <div class="central-meta item">
                                        <div class="user-post">
                                            <div class="friend-info">
                                                <figure>
                                                    <img src="{{$p->user->avatar}}" alt="">
                                                </figure>
                                                <div class="friend-name">
                                                    <ins><a href="{{route('profile.username', ['username' => $p->user->username])}}" title="">{{$p->user->username}}</a></ins>
                                                    <span>published: june,2 2018 19:PM</span>
                                                </div>
                                                <div class="post-meta">
                                                    <a href="{{route('post.id', ['id' => $p->id])}}"><img src="{{$p->image}}" alt=""></a>
                                                    <div class="we-video-info">
                                                        <ul>

                                                            <li>
															<a href="{{route('post.id', ['id' => $p->id])}}">
                                                                <span  class="comment" data-toggle="tooltip" title="Comments">
                                                                    <i class="ti-comments"></i>
                                                                    <ins>{{$p->comment_count}}</ins>
                                                                </span>
															</a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('like.create') }}" method="POST">
                                                                    @csrf
                                                                    <input name="user_id" type="hidden" value="{{session()->get('user')->id}}">
                                                                    <input name="post_id" type="hidden" value="{{$p->id}}">
                                                                    <button type = "submit" class="like" data-toggle="tooltip" title="like" class="btn btn-link">
                                                                        <!-- <span class="like" data-toggle="tooltip" title="like"> -->
                                                                            <i class="ti-heart"></i>
                                                                            <ins>{{$p->like_count}}</ins>
                                                                        <!-- </span> -->
                                                                    </button>
                                                                </form>
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
                                                            {{$p->content}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- centerl meta -->
                            <div class="col-lg-3">
                                <aside class="sidebar static">
                                    <div class="widget">
                                        <h4 class="widget-title">Your page</h4>
                                        <div class="your-page">
                                            <figure>
                                                <a href="#" title=""><img src="{{secure_asset('assets/user/images/resources/friend-avatar9.jpg')}}" alt=""></a>
                                            </figure>
                                            <div class="page-meta">
                                                <a href="#" title="" class="underline">My page</a>
                                                <span><i class="ti-comment"></i><a href="insight.html" title="">Messages <em>9</em></a></span>
                                                <span><i class="ti-bell"></i><a href="insight.html" title="">Notifications <em>2</em></a></span>
                                            </div>
                                            <div class="page-likes">
                                                <ul class="nav nav-tabs likes-btn">
                                                    <li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
                                                    <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active fade show " id="link1" >
                                                        <span><i class="ti-heart"></i>884</span>
                                                        <a href="#" title="weekly-likes">35 new likes this week</a>
                                                        <div class="users-thumb-list">
                                                            <a href="#" title="Anderw" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-1.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="frank" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-2.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Sara" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-3.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Amy" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-4.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Ema" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-5.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Sophie" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-6.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Maria" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-7.jpg')}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="link2" >
                                                        <span><i class="ti-eye"></i>440</span>
                                                        <a href="#" title="weekly-likes">440 new views this week</a>
                                                        <div class="users-thumb-list">
                                                            <a href="#" title="Anderw" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-1.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="frank" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-2.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Sara" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-3.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Amy" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-4.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Ema" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-5.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Sophie" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-6.jpg')}}" alt="">
                                                            </a>
                                                            <a href="#" title="Maria" data-toggle="tooltip">
                                                                <img src="{{secure_asset('assets/user/images/resources/userlist-7.jpg')}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- page like widget -->
                                    <div class="widget">
                                        <div class="banner medium-opacity bluesh">
                                            <div class="bg-image" style="background-image: url(assets/user/images/resources/baner-widgetbg.jpg)"></div>
                                            <div class="baner-top">
                                                <span><img alt="" src="images/book-icon.png"></span>
                                                <i class="fa fa-ellipsis-h"></i>
                                            </div>
                                            <div class="banermeta">
                                                <p>
                                                    create your own favourit page.
                                                </p>
                                                <span>like them all</span>
                                                <a data-ripple="" title="" href="#">start now!</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget friend-list stick-widget">
                                        <h4 class="widget-title">Friends</h4>
                                        <div id="searchDir"></div>
                                        <ul id="people-list" class="friendz-list">
                                            <li>
                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar.jpg')}}" alt="">
                                                    <span class="status f-online"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">bucky barnes</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a0d7c9ced4c5d2d3cfccc4c5d2e0c7cdc1c9cc8ec3cfcd">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar2.jpg')}}" alt="">
                                                    <span class="status f-away"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">Sarah Loren</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b4d6d5c6dad1c7f4d3d9d5ddd89ad7dbd9">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar3.jpg')}}" alt="">
                                                    <span class="status f-off"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">jason borne</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1d777c6e72737f5d7a707c7471337e7270">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar4.jpg')}}" alt="">
                                                    <span class="status f-off"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">Cameron diaz</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bed4dfcdd1d0dcfed9d3dfd7d290ddd1d3">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>

                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar5.jpg')}}" alt="">
                                                    <span class="status f-online"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">daniel warber</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="553f34263a3b37153238343c397b363a38">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>

                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar6.jpg')}}" alt="">
                                                    <span class="status f-away"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">andrew</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5933382a36373b193e34383035773a3634">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>

                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar7.jpg')}}" alt="">
                                                    <span class="status f-off"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">amy watson</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5933382a36373b193e34383035773a3634">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>

                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar5.jpg')}}" alt="">
                                                    <span class="status f-online"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">daniel warber</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dbb1baa8b4b5b99bbcb6bab2b7f5b8b4b6">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                            <li>

                                                <figure>
                                                    <img src="{{secure_asset('assets/user/images/resources/friend-avatar2.jpg')}}" alt="">
                                                    <span class="status f-away"></span>
                                                </figure>
                                                <div class="friendz-meta">
                                                    <a href="time-line.html">Sarah Loren</a>
                                                    <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2644475448435566414b474f4a0845494b">[email&#160;protected]</a></i>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="chat-box">
                                            <div class="chat-head">
                                                <span class="status f-online"></span>
                                                <h6>Bucky Barnes</h6>
                                                <div class="more">
                                                    <span><i class="ti-more-alt"></i></span>
                                                    <span class="close-mesage"><i class="ti-close"></i></span>
                                                </div>
                                            </div>
                                            <div class="chat-list">
                                                <ul>
                                                    <li class="me">
                                                        <div class="chat-thumb"><img src="{{secure_asset('assets/user/images/resources/chatlist1.jpg')}}" alt=""></div>
                                                        <div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
                                                            <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                        </div>
                                                    </li>
                                                    <li class="you">
                                                        <div class="chat-thumb"><img src="{{secure_asset('assets/user/images/resources/chatlist2.jpg')}}" alt=""></div>
                                                        <div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
                                                            <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                        </div>
                                                    </li>
                                                    <li class="me">
                                                        <div class="chat-thumb"><img src="{{secure_asset('assets/user/images/resources/chatlist1.jpg')}}" alt=""></div>
                                                        <div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
                                                            <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <form class="text-box">
                                                    <textarea placeholder="Post enter to post..."></textarea>
                                                    <div class="add-smiles">
                                                        <span title="add icon" class="em em-expressionless"></span>
                                                    </div>
                                                    <div class="smiles-bunch">
                                                        <i class="em em---1"></i>
                                                        <i class="em em-smiley"></i>
                                                        <i class="em em-anguished"></i>
                                                        <i class="em em-laughing"></i>
                                                        <i class="em em-angry"></i>
                                                        <i class="em em-astonished"></i>
                                                        <i class="em em-blush"></i>
                                                        <i class="em em-disappointed"></i>
                                                        <i class="em em-worried"></i>
                                                        <i class="em em-kissing_heart"></i>
                                                        <i class="em em-rage"></i>
                                                        <i class="em em-stuck_out_tongue"></i>
                                                    </div>
                                                    <button type="submit"></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- friends list sidebar -->
                                </aside>
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
