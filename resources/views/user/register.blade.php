<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Wibu Social Network Media</title>
    <link rel="icon" href="{{secure_asset('assets/user/images/fav.png')}}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/assets/user/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/assets/user/css/themify-icons.css">
    <link rel="stylesheet" href="{{secure_asset('assets/user/css/main.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/user/css/color.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/user/css/responsive.css')}}">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="container-fluid pdng0">
        <div class="row merged">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="land-featurearea">
                    <div class="land-meta">
                        <h1>Wibu Media</h1>
                        <p>
                            Wibu Media is free to use for as long as you want with two active projects.
                        </p>
                        <div class="friend-logo">
                            <span><img src="{{secure_asset('assets/user/images/wink.png')}}" alt=""></span>
                        </div>
                        <a href="#" title="" class="folow-me">Follow Us on</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-reg-bg">
                    <div class="log-reg-area sign">
                        <h2 class="log-title">Register</h2>
                        @isset($msg)
                            <p>{{$msg}}</p>
                        @endisset
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" required="required"/>
                                <label class="control-label" for="input">Full name</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" required="required"/>
                                <label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required="required"/>
                                <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                            </div>
{{--                            <div class="form-radio">--}}
{{--                                <div class="radio">--}}
{{--                                    <label>--}}
{{--                                        <input type="radio" name="radio" checked="checked"/><i class="check-box"></i>Male--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="radio">--}}
{{--                                    <label>--}}
{{--                                        <input type="radio" name="radio"/><i class="check-box"></i>Female--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <input type="email" name="email" required="required"/>
                                <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" required="required"/>
                                <label class="control-label" for="input">Phone</label><i class="mtrl-select"></i>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked="checked"/><i class="check-box"></i>Accept Terms & Conditions ?
                                </label>
                            </div>
                            <a href="{{route('login')}}" title="" class="already-have">Already have an account</a>
                            <div class="submit-btns">
                                <button class="mtr-btn signin" type="submit"><span>Register</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{secure_asset('assets/user/js/main.min.js')}}"></script>
<script src="{{secure_asset('assets/user/js/script.js')}}"></script>

</body>

</html>
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <title>Wibugram - Login</title>--}}
{{--    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->--}}
{{--    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
{{--    <!--[if lt IE 9]>--}}
{{--      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
{{--      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
{{--      <![endif]-->--}}
{{--    <!-- Meta -->--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge" />--}}
{{--    <meta name="description" content="CodedThemes">--}}
{{--    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">--}}
{{--    <meta name="author" content="CodedThemes">--}}
{{--    <!-- Favicon icon -->--}}
{{--    <link rel="icon" href="{{secure_asset('assets/images/favicon.ico" type="image/x-icon">--}}
{{--    <!-- Google font-->--}}
{{--    <link href="{{secure_asset('https://fonts.googleapis.com/assets/user/css?family=Open+Sans:400,600,800" rel="stylesheet">--}}
{{--    <!-- Required Fremwork -->--}}
{{--    <link rel="stylesheet" type="text/assets/user/css" href="{{secure_asset('assets/assets/user/css/bootstrap/assets/user/css/bootstrap.min.assets/user/css">--}}
{{--    <!-- themify-icons line icon -->--}}
{{--    <link rel="stylesheet" type="text/assets/user/css" href="{{secure_asset('assets/icon/themify-icons/themify-icons.assets/user/css">--}}
{{--    <!-- ico font -->--}}
{{--    <link rel="stylesheet" type="text/assets/user/css" href="{{secure_asset('assets/icon/icofont/assets/user/css/icofont.assets/user/css">--}}
{{--    <!-- Style.assets/user/css -->--}}
{{--    <link rel="stylesheet" type="text/assets/user/css" href="{{secure_asset('assets/assets/user/css/style.assets/user/css">--}}
{{--</head>--}}

{{--<body class="fix-menu">--}}
{{--    <!-- Pre-loader start -->--}}
{{--    <div class="theme-loader">--}}
{{--    <div class="ball-scale">--}}
{{--        <div class='contain'>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--            <div class="ring"><div class="frame"></div></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--    <!-- Pre-loader end -->--}}

{{--    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">--}}
{{--        <!-- Container-fluid starts -->--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12">--}}
{{--                    <!-- Authentication card start -->--}}
{{--                    <div class="login-card card-block auth-body mr-auto ml-auto">--}}
{{--                        <form action="{{ route('login') }}" class="md-float-material" method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="text-center">--}}
{{--                                <img src="{{secure_asset('assets/images/auth/logo-dark.png')}}" alt="logo.png">--}}
{{--                            </div>--}}
{{--                            <div class="auth-box">--}}
{{--                                <div class="row m-b-20">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <h3 class="text-left txt-primary">Đăng nhập</h3>--}}
{{--                                        @isset($msg)--}}
{{--                                            <span>{{$msg}}</span>--}}
{{--                                        @endisset--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <hr/>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">--}}
{{--                                    <span class="md-line"></span>--}}
{{--                                </div>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">--}}
{{--                                    <span class="md-line"></span>--}}
{{--                                </div>--}}
{{--                                <div class="row m-t-25 text-left">--}}
{{--                                    <div class="col-sm-7 col-xs-12">--}}
{{--                                        <div class="checkbox-fade fade-in-primary">--}}
{{--                                            <label>--}}
{{--                                                <input type="checkbox" value="">--}}
{{--                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>--}}
{{--                                                <span class="text-inverse">Nhớ tài khoản</span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">--}}
{{--                                        <a href="{{secure_asset('#" class="text-right f-w-600 text-inverse"> Quên mật khẩu?</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row m-t-30">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Đăng nhập</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <hr/>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-10">--}}
{{--                                        <p class="text-inverse text-left m-b-0">Cảm ơn bạn đã tham gia Wibugram</p>--}}
{{--                                        <p class="text-inverse text-left"><b>Wibugram team</b></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <img src="{{secure_asset('assets/images/auth/Logo-small-bottom.png')}}" alt="small-logo.png">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <!-- end of form -->--}}
{{--                    </div>--}}
{{--                    <!-- Authentication card end -->--}}
{{--                </div>--}}
{{--                <!-- end of col-sm-12 -->--}}
{{--            </div>--}}
{{--            <!-- end of row -->--}}
{{--        </div>--}}
{{--        <!-- end of container-fluid -->--}}
{{--    </section>--}}
{{--    <!-- Warning Section Starts -->--}}
{{--    <!-- Older IE warning message -->--}}
{{--    <!--[if lt IE 9]>--}}
{{--<div class="ie-warning">--}}
{{--    <h1>Warning!!</h1>--}}
{{--    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>--}}
{{--    <div class="iew-container">--}}
{{--        <ul class="iew-download">--}}
{{--            <li>--}}
{{--                <a href="{{secure_asset('http://www.google.com/chrome/">--}}
{{--                    <img src="{{secure_asset('assets/images/browser/chrome.png')}}" alt="Chrome">--}}
{{--                    <div>Chrome</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{secure_asset('https://www.mozilla.org/en-US/firefox/new/">--}}
{{--                    <img src="{{secure_asset('assets/images/browser/firefox.png')}}" alt="Firefox">--}}
{{--                    <div>Firefox</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{secure_asset('http://www.opera.com">--}}
{{--                    <img src="{{secure_asset('assets/images/browser/opera.png')}}" alt="Opera">--}}
{{--                    <div>Opera</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{secure_asset('https://www.apple.com/safari/">--}}
{{--                    <img src="{{secure_asset('assets/images/browser/safari.png')}}" alt="Safari">--}}
{{--                    <div>Safari</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{secure_asset('http://windows.microsoft.com/en-us/internet-explorer/download-ie">--}}
{{--                    <img src="{{secure_asset('assets/images/browser/ie.png')}}" alt="">--}}
{{--                    <div>IE (9 & above)</div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <p>Sorry for the inconvenience!</p>--}}
{{--</div>--}}
{{--<![endif]-->--}}
{{--    <!-- Warning Section Ends -->--}}
{{--    <!-- Required Jquery -->--}}
{{--    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>--}}
{{--    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>--}}
{{--    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>--}}
{{--    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>--}}
{{--    <!-- jquery slimscroll js -->--}}
{{--    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>--}}
{{--    <!-- modernizr js -->--}}
{{--    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>--}}
{{--    <script type="text/javascript" src="assets/js/modernizr/assets/user/css-scrollbars.js"></script>--}}
{{--    <script type="text/javascript" src="assets/js/common-pages.js"></script>--}}
{{--</body>--}}

{{--</html>--}}
