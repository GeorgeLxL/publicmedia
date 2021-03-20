<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"

<head>
  <meta charset="utf-8">
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>PublicMedia| @yield('title')</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }} " rel="icon">
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
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/top.css') }}" rel="stylesheet">
  <link href="{{ asset('css/public-style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendor/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('vendor/hoverIntent/hoverIntent.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>


</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header-fixed">
    <div class="container max_container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#intro">The<span>Event</span></a></h1>-->
        <a href="#" class="scrollto"><img src="{{ asset('img/logo-white.png') }}" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
          <ul class="nav-menu">
              <li><a class="btn btn-gray icon-home round-8" href="/home">基本情報</a></li>
              <li><a class="btn btn-gray icon-cut round-8" href="/menu">メニュー</a></li>
              <li><a class="btn btn-gray icon-calender round-8" href="/reserve/0">予約</a></li>
              
              <li> 
                  <div class="dropdown">
                      <button class="btn btn-gray icon-account round-8 dropbtn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">User<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                          <li><a href="/mypage">マイページ</a></li>
                          <li><a href="/account">アカウント設定</a></li>
                          <li><a href="/resetpassword">パスワード変更</a></li>
                          <li><a href="/stylistlogout">ログアウト</a></li>
                      </ul>
                  </div>
              </li>
          </ul>
      </nav>
      
    </div>
    <div class="page-title">
      @yield('page-title')
    </div>
  </header><!-- End Header -->
  <main id="main" style="padding-top:70px">
    @yield('content')
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
           <h3>Public <font style="color: #f82249;;">Media</font></h3>
            <!-- <img src="assets/img/logo.png" alt="TheEvenet"> -->
            <!-- <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p> -->
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
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Public Media</strong>. All Rights Reserved
      </div>
      <!-- <div class="credits"> -->
      <!-- </div> -->
    </div>
  </footer><!-- End  Footer -->

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
@yield('script')
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>