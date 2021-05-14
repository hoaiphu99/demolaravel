<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ secure_asset('assets/user/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/lightgallery.min.css')}}">

  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{ secure_asset('assets/user/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/swiper.css')}}">

  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/aos.css')}}">

  <link rel="stylesheet" href="{{ secure_asset('assets/user/css/style.css')}}">

</head>
<body ng-app="myApp">

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>




    <header class="site-navbar py-3" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2" data-aos="fade-down">
            <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0">Photosen</a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li class="has-children">
                  <a href="#">Gallery</a>
                  <ul class="dropdown">
                    <li><a href="#">Anime</a></li>
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Animal</a></li>
                    <li><a href="#">Sport</a></li>
                  </ul>
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="{{ route('login') }}">My Account</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
                </li>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>

    </header>

    @section('content')
    @show



    <div class="footer py-4">
      <div class="container-fluid text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>





  </div>
  <script type="text/javascript" src="{{ secure_asset('vendor/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('vendor/angular-1.5.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('vendor/angular-animate.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('vendor/angular-aria.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('vendor/angular-messages.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('vendor/angular-material.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/main.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('assets/js/jquery/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('assets/js/popper.js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ secure_asset('assets/user/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/jquery-ui.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/popper.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/bootstrap.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/owl.carousel.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/jquery.countdown.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/swiper.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/aos.js')}}"></script>

  <script src="{{ secure_asset('assets/user/js/picturefill.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/lightgallery-all.min.js')}}"></script>
  <script src="{{ secure_asset('assets/user/js/jquery.mousewheel.min.js')}}"></script>

  <script src="{{ secure_asset('assets/user/js/main.js')}}"></script>
  <script src="{{ secure_asset('assets/user/main.js')}}"></script>

  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>

</body>
</html>
