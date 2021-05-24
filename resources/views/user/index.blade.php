@extends('user.master')
@section('title', 'WibuGram')
@section('content')


    <!--<div class="se-pre-con"></div>-->
{{--    <div class="theme-layout">--}}





        <section>
            <div class="feature-photo">
                <figure><img src="images/resources/timeline-1.jpg" alt=""></figure>
                <div class="add-btn">
                    <span>1205 followers</span>
                    <a href="#" title="" data-ripple="">Add Friend</a>
                </div>
                <form class="edit-phto">
                    <i class="fa fa-camera-retro"></i>
                    <label class="fileContainer">
                        Edit Cover Photo
                        <input type="file"/>
                    </label>
                </form>
                <div class="container-fluid">
                    <div class="row merged">
                        <div class="col-lg-2 col-sm-3">
                            <div class="user-avatar">
                                <figure>
                                    <img src="images/resources/user-avatar.jpg" alt="">
                                    <form class="edit-phto">
                                        <i class="fa fa-camera-retro"></i>
                                        <label class="fileContainer">
                                            Edit Display Photo
                                            <input type="file"/>
                                        </label>
                                    </form>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-9">
                            <div class="timeline-info">
                                <ul>
                                    <li class="admin-name">
                                        <h5>Janice Griffith</h5>
                                        <span>Group Admin</span>
                                    </li>
                                    <li>
                                        <a class="" href="time-line.html" title="" data-ripple="">time line</a>
                                        <a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
                                        <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>
                                        <a class="" href="timeline-friends.html" title="" data-ripple="">Friends</a>
                                        <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a>
                                        <a class="" href="about.html" title="" data-ripple="">about</a>
                                        <a class="active" href="#" title="" data-ripple="">more</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- top area -->

        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">
                                <div class="col-lg-9">
                                    <div class="inbox-sec">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-4">
                                                <div class="inbox-navigation">
                                                    <div class="inbox-panel-head">
                                                        <img alt="" src="images/resources/friend-avatar11.jpg">
                                                        <h1><i>Brian</i> Kelly</h1>
                                                        <a title="" href="edit-profile-basic.html"><i class="fa fa-user"></i>Profile</a>
                                                        <a title="" href="edit-account-setting.html"><i class="fa fa-cog"></i>Setting</a>
                                                        <ul>
                                                            <li><a class="compose-btn" title="" href="#">Compose</a></li>
                                                        </ul>
                                                    </div><!-- Inbox Panel Head -->
                                                    <ul>
                                                        <li class="active"><a title=""><i class="fa fa-inbox"></i>Inbox</a><span>4</span></li>
                                                        <li><a title=""><i class="fa fa-paper-plane-o"></i>Draft</a></li>
                                                        <li><a title=""><i class="fa fa-repeat"></i>Outbox</a><span>6</span></li>
                                                        <li><a title=""><i class="fa fa-plane"></i>Sent</a></li>
                                                        <li><a title=""><i class="fa fa-trash-o"></i>Trash</a></li>
                                                    </ul>
                                                    <div class="flaged">
                                                        <h3><i class="fa fa-flag"></i>FLAGGED</h3>
                                                        <ul>
                                                            <li><a title="" href="#"><i style="color:#ff5c5c;" class="fa fa-tag"></i>Family</a></li>
                                                            <li><a title="" href="#"><i style="color:#3ac1e3;" class="fa fa-tag"></i>Friends</a></li>
                                                            <li><a title="" href="#"><i style="color:#f3d547;" class="fa fa-tag"></i>Private</a></li>
                                                            <li><a title="" href="#"><i style="color:#b447f3;" class="fa fa-tag"></i>Office Staff</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <div class="inbox-lists">
                                                    <div class="inbox-action">
                                                        <ul>
                                                            <li><label><input type="checkbox" name="select-all" id="select_all" /> Select all</label></li>
                                                            <li><a class="delete-email" title=""><i class="fa fa-trash-o"></i> Delete</a></li>
                                                            <li><a title=""><i class="fa fa-refresh"></i> Refresh</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mesages-lists">
                                                        <form method="post">
                                                            <input type="text" placeholder="Search Email">
                                                        </form>
                                                        <ul id="message-list" class="message-list">
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this starred"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Darlina Jaze</h3>
                                                                <a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>It is a long established fact that a reader will be distracted</p>
                                                            </li>
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this "><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Barlina Maze</h3>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>That a reader will be distracted by the readable content..</p>
                                                            </li>
                                                            <li class="read">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this starred"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Jonathan Dae</h3>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>Will be distracted by the readable..</p>
                                                            </li>
                                                            <li class="read">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Humaina Burb</h3>
                                                                <a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
                                                                <span class="make-important important-done"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>It is a long established fact by the readable ponkaa..</p>
                                                            </li>
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this "><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Barlina Maze</h3>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>Long  will be distracted by the readable..</p>
                                                            </li>
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this starred"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Darlina Jaze</h3>
                                                                <a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>Reader will be distracted by the nalanye..</p>
                                                            </li>
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this starred"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Darlina Jaze</h3>
                                                                <a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>It is a long established fact that a reader will be distracted</p>
                                                            </li>
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this "><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Barlina Maze</h3>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>That a reader will be distracted by the readable content..</p>
                                                            </li>
                                                            <li class="read">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this starred"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Jonathan Dae</h3>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>Will be distracted by the readable..</p>
                                                            </li>
                                                            <li class="read">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Humaina Burb</h3>
                                                                <a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
                                                                <span class="make-important important-done"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>It is a long established fact by the readable ponkaa..</p>
                                                            </li>
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this "><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Barlina Maze</h3>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>Long  will be distracted by the readable..</p>
                                                            </li>
                                                            <li class="unread">
                                                                <input class="select-message" type="checkbox" />
                                                                <span class="star-this starred"><i class="fa fa-star-o"></i></span>

                                                                <h3 class="sender-name">Darlina Jaze</h3>
                                                                <a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
                                                                <span class="make-important"><i class="fa fa-thumb-tack"></i></span>

                                                                <p>Reader will be distracted by the nalanye..</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div><!-- Inbox lists -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <aside class="sidebar static">
                                        <div class="advertisment-box">
                                            <h4 class="">advertisment</h4>
                                            <figure>
                                                <a href="#" title="Advertisment"><img src="images/resources/ad-widget.jpg" alt=""></a>
                                            </figure>
                                        </div>
                                        <div class="widget friend-list stick-widget">
                                            <h4 class="widget-title">Friends</h4>
                                            <div id="searchDir"></div>
                                            <ul id="people-list" class="friendz-list">
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar.jpg" alt="">
                                                        <span class="status f-online"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">bucky barnes</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f6819f9882938485999a929384b6919b979f9ad895999b">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar2.jpg" alt="">
                                                        <span class="status f-away"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">Sarah Loren</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d6b4b7a4b8b3a596b1bbb7bfbaf8b5b9bb">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar3.jpg" alt="">
                                                        <span class="status f-off"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">jason borne</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="157f74667a7b77557278747c793b767a78">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="images/resources/friend-avatar4.jpg" alt="">
                                                        <span class="status f-off"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">Cameron diaz</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="771d160418191537101a161e1b5914181a">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar5.jpg" alt="">
                                                        <span class="status f-online"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">daniel warber</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="462c273529282406212b272f2a6825292b">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar6.jpg" alt="">
                                                        <span class="status f-away"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">andrew</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="94fef5e7fbfaf6d4f3f9f5fdf8baf7fbf9">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar7.jpg" alt="">
                                                        <span class="status f-off"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">amy watson</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="650f04160a0b07250208040c094b060a08">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar5.jpg" alt="">
                                                        <span class="status f-online"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">daniel warber</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d3b9b2a0bcbdb193b4beb2babffdb0bcbe">[email&#160;protected]</a></i>
                                                    </div>
                                                </li>
                                                <li>

                                                    <figure>
                                                        <img src="images/resources/friend-avatar2.jpg" alt="">
                                                        <span class="status f-away"></span>
                                                    </figure>
                                                    <div class="friendz-meta">
                                                        <a href="time-line.html">Sarah Loren</a>
                                                        <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="335152415d564073545e525a5f1d505c5e">[email&#160;protected]</a></i>
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
                                                            <div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
                                                            <div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
                                                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                            </div>
                                                        </li>
                                                        <li class="you">
                                                            <div class="chat-thumb"><img src="images/resources/chatlist2.jpg" alt=""></div>
                                                            <div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
                                                                <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                                                            </div>
                                                        </li>
                                                        <li class="me">
                                                            <div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
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

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="widget">
                            <div class="foot-logo">
                                <div class="logo">
                                    <a href="index-2.html" title=""><img src="images/logo.png" alt=""></a>
                                </div>
                                <p>
                                    The trio took this simple idea and built it into the world’s leading carpooling platform.
                                </p>
                            </div>
                            <ul class="location">
                                <li>
                                    <i class="ti-map-alt"></i>
                                    <p>33 new montgomery st.750 san francisco, CA USA 94105.</p>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p>+1-56-346 345</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title"><h4>follow</h4></div>
                            <ul class="list-style">
                                <li><i class="fa fa-facebook-square"></i> <a href="https://web.facebook.com/shopcircut/" title="">facebook</a></li>
                                <li><i class="fa fa-twitter-square"></i><a href="https://twitter.com/login?lang=en" title="">twitter</a></li>
                                <li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/?hl=en" title="">instagram</a></li>
                                <li><i class="fa fa-google-plus-square"></i> <a href="https://plus.google.com/discover" title="">Google+</a></li>
                                <li><i class="fa fa-pinterest-square"></i> <a href="https://www.pinterest.com/" title="">Pintrest</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title"><h4>Navigate</h4></div>
                            <ul class="list-style">
                                <li><a href="about.html" title="">about us</a></li>
                                <li><a href="contact.html" title="">contact us</a></li>
                                <li><a href="terms.html" title="">terms & Conditions</a></li>
                                <li><a href="#" title="">RSS syndication</a></li>
                                <li><a href="sitemap.html" title="">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title"><h4>useful links</h4></div>
                            <ul class="list-style">
                                <li><a href="#" title="">leasing</a></li>
                                <li><a href="#" title="">submit route</a></li>
                                <li><a href="#" title="">how does it work?</a></li>
                                <li><a href="#" title="">agent listings</a></li>
                                <li><a href="#" title="">view All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="widget">
                            <div class="widget-title"><h4>download apps</h4></div>
                            <ul class="colla-apps">
                                <li><a href="https://play.google.com/store?hl=en" title=""><i class="fa fa-android"></i>android</a></li>
                                <li><a href="https://www.apple.com/lae/ios/app-store/" title=""><i class="ti-apple"></i>iPhone</a></li>
                                <li><a href="https://www.microsoft.com/store/apps" title=""><i class="fa fa-windows"></i>Windows</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- footer -->
        <div class="bottombar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="copyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></span>
                        <i><img src="images/credit-cards.png" alt=""></i>
                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}





    {{--    <div class="container-fluid" data-aos="fade" data-aos-delay="500" ng-controller="MyController" >--}}
{{--        <div class="row">--}}
{{--             @foreach ($posts->data as $p)--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="image-wrap-2">--}}
{{--                        <div class="image-info">--}}
{{--                            <h2 class="mb-3">{{ $p->name }}</h2>--}}
{{--                            <a href="{{ route('post.id', ['id' => $p->id]) }}" class="btn btn-outline-white py-2 px-4">Click me</a>--}}
{{--                        </div>--}}
{{--                        <img src="{{ $p->image }}" alt="{{ $p->content }}" class="img-fluid">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--             @endforeach--}}

{{--            --}}{{-- <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Portrait</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_2.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">People</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_3.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Architecture</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_4.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Animals</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_5.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Sports</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_6.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Travel</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_7.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">People</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_3.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="image-wrap-2">--}}
{{--                    <div class="image-info">--}}
{{--                        <h2 class="mb-3">Architecture</h2>--}}
{{--                        <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>--}}
{{--                    </div>--}}
{{--                    <img src="<%  asset('assets/images/img_4.jpg')  %>" alt="Image" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div> --}}

{{--        </div>--}}
{{--    </div>--}}

@endsection
