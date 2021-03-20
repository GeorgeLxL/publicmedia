<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/top.css') }}" rel="stylesheet">
  <link href="{{ asset('css/public-style.css') }}" rel="stylesheet">
  @yield('page_css')
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
</head>

<body>
  <?php
    date_default_timezone_set('Asia/Tokyo');
  ?>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="menu-container">
      <div id="logo" class="pull-left">
          <a href="{{url('/')}}" class="scrollto"><img src="{{ asset('img/logo-white.png') }}" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
          <ul class="nav-menu">
              <li><a href="{{url('/')}}">ホーム</a></li>
              <li><a href="{{url('search')}}">サーチ</a></li>
              <li><a href="{{url('about_us_page')}}">私たちに関しては</a></li>
              <!-- <li><a href="#contact">Contact</a></li> -->
              <li> 
                  <div class="dropdown">
                      <button class="btn btn-dropdown-red dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        @guest
                        ログイン
                        @else
                        {{ Auth::user()->name_kanzi }}
                        @endguest
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                          @guest
                          <li><a href="{{route('login')}}">ログイン</a></li>
                          <li><a href="{{url('register_page')}}">新規登録</a></li>
                          @else
                          <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('custom-logout-form').submit();">ログアウト</a></li>
                          <li><a href="{{url('my_favorite_page')}}">お気に入りリスト</a></li>
                          <form id="custom-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                          @endguest
                          <li><a href="/adminlogin">美容師の方はこちら</a></li>
                      </ul>
                  </div>
              </li>
          </ul>
      </nav>
    </div>
  </header>
  
  <!-- End Header -->
  
  @yield('content')

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
           <h3>Public <font style="color: #f82249;;">Media</font></h3>
            <p>「なりたい」と「叶える」を実現する<br/>エリア別ヘアスタイルマッチング予約サイト</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>リンク</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">運営会社</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">利用規約</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">個人情報保護法方針（プライバシーポリシー）</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>リンク</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">特定商取引に関する法律に基づく表示</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">広告掲載を希望の方へ</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">よくある質問</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">お問い合わせ</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              株式会社パブリックメディア事業部 <br> 
              東京都港区南青山2-12-15<br>
              ユニマット外苑ビル8F <br>
              株式会社髪書房内 パブリックメディア事業部<br/>
              <strong>Mail:</strong> +example@hotmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://instagram.com" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://plus.google.com" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="https://www.linkedin.com" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Public Media</strong>. All Rights Reserved
      </div>

    </div>
  </footer>


  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/venobox/venobox.js') }}"></script>
  <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendor/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('vendor/hoverIntent/hoverIntent.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('js/toastr.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  @yield('script')       
</body>

</html>