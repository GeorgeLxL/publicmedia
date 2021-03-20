@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('content')
  <div class="height-90"></div>
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="manager_about" style="padding: 60px 0 60px 0;">
      <div class="container" data-aos="fade-up">
        <div class="row" style="height: 100%;">
          <div class="col-lg-6">
            <div class="manager_about_header">
              <div>
                <p><img class="logo_image" src="{{asset('img/logo-big.png') }}" alt="" title=""></p>
                <p>
                  “なりたい”と“叶える”を繋ぐ<br/>
                  あなたのInstagramアカウントを連動し、<br/>
                  あなたの投稿から指名予約を直接獲得。
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6" style="display: flex; align-items: flex-end; justify-content: center;">
            <img src="{{asset('img/smartphone-bg.png') }}" style="max-width: 450px; width: 100%;">
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="section-header-01">
          <p class="mb-0"><img class="logo_image" src="{{asset('/img/icons/logo.png') }}" alt="" title=""></p>
          <p class="logo-head-title">SERVICE</p>
          <h2>アカウントを連動するたけ</h2>
        </div>
        <div class="row">
          <div class="col-lg-6" style="color:#8D6654;">
            <div class="full-middle">
              <div>
                <p>
                Public Mediaヘアカタログに投稿するだけ<br/>
                Public Media（パブリックメディア）は、<br/>
                美容師とお客様を直接つなぐヘアカタログ<br/><br/>
                美容師個人で撮影した画像を投稿するだけ<br/>
                業界誌が、運営するリアルヘアカタログに<br/>
                連動して掲載されます。
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="{{asset('/img/about.png') }}" style="width: 100%; height: 100%;">
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <section id="buy-tickets" class="section-with-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-header">
            <h2>Vision</h2>
            <p>美容院選びの失敗をゼロにする</p>
          </div>
  
          <div class="row" style="display: flex;flex-wrap: wrap;">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
              <div class="card mb-5 mb-lg-0">
                <p style="padding-left: 20%; padding-right: 20%; padding-top: 45px; padding-bottom: 45px; margin-bottom: 0; text-align: center;font-size: 20px; font-weight: 600;">
                  美容室選びで失敗したことがある人多いと思います。
                  <br/><br/>
                  原因は、クーポンサイトで選ぶからです。<br/>
                  掲載されているスタイル写真は、撮影用に作ったもので、
                  担当していただく美容師さんの作品ではないことも多いです。<br/>
                  写真を見て、お気に入りのヘアスタイルを選んで予約しても、
                  何か違う・・・<br/>
                  ボブスタイルにイメージチェンジしたいと思って予約しても、担当美容師さんが、得意なのはロングスタイルだったり・・
                  ヘアカラーにこだわりたいのに、何か違ったり・・
                  <br/><br/>
                  そんなミスマッチを防ぐための「あったら良いな」を実現するPublic Media（パブリックメディア）リアルヘアカタログ
                  <br/><br/>
                  美容師さん個人が作ったリアルヘアカタログだから、担当してもらう美容師さんが、「どんなスタイルが得意なのか」
                  「ヘアカラーにこだわっているのか」「パーマスタイルが得意なのか」「どんな人柄なのか」などを、理解してから予約ができます。
                  <br/><br/>
                  自分だけのスタイリストを見つけることが可能です。
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

  </main>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#header').addClass('bg-color-black');
        $('.height-90').show();
    });


    function historyBack() {
        window.history.back()
    }

    function search()
    {
      window.location.href="{{url('search')}}";
    }
</script>
@endsection