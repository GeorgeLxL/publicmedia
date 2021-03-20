@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('page_css')
<style>
  .gallery-img{
    border-radius: 50%;
    max-width: 275px;
    max-height: 275px;
    object-fit: cover;
  }

  #gallery .gallery-carousel .center {
    border-radius: 50%;
    max-width: 275px;
    max-height: 275px;
  }
</style>
@endsection
@section('content')

  <!-- ======= Intro Section ======= -->
  <section id="intro">
    <div class="intro-container" data-aos="zoom-in" data-aos-delay="100">
      @php
        $sentences = explode("/",$returnData['introData'][0]->advertise)
      @endphp
      <h1 class="mb-4 pb-0">
      @foreach($sentences as $sentence)
        @if(strpos($sentence, 'サイト')!==false)
          <span>{{$sentence}}</span> <br>
        @else
          {{$sentence}}<br>
        @endif
      @endforeach
      </h1>
      <a href="/search" class="play-btn mb-4"></a>
    </div>
  </section>
  <!-- End Intro Section -->

  <main id="main">
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>「なりたい」髪型 × エリア</h2>
          <p>なりたい髪型とエリアでヘアスタイルを検索してみよう！</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/1.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/2.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/3.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/4.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/5.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/6.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/7.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="{{ asset('img/supporters/8.png') }}" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>

    </section>
    <section id="gallery">

      <div class="owl-carousel gallery-carousel" data-aos="fade-up" data-aos-delay="100">
          @foreach($returnData['galleryData'] as $gallery)
            <a href="{{asset($gallery->url) }}" class="venobox" data-gall="gallery-carousel"><img class="gallery-img"  src="{{asset($gallery->url) }}" alt=""></a>
          @endforeach
      </div>
    </section>
    <section class="reserve_order_bg">
      <div id="reserve_order" >
        <div class="container max-width-700" data-aos="fade-up">
          <div class="search-button-content mt-0 mb-30" data-aos="fade-up" data-aos-delay="100">
            <div class="search"><button onclick="search()" type="button" class="btn btn-black shadow-8">ヘアスタイルをチェックする</button></div>
          </div>
          <div class="row">
            @foreach($returnData['guideData'] as $guide)
            <div class="col-12" data-aos="fade-up" data-aos-delay="100">
              <div class="step">
                <div class="steptitle">{{$guide->title}}</div> 
                <div class="stepcontent">{{$guide->content}}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section id="intersection">
      <div class="container max-width-700" data-aos="fade-up">
        <div class="section-header-02">
          <h2 class="section-title"><span>パブリックメディアを利用する</span></h2>
        </div>
        <div class="row intersection_container">
          <div class="col-2">
            <a href="https://instagram.com"><img src="{{asset('img/icons/Intersection_3.png') }}"/></a>
          </div>
          <div class="col-2">
            <a href="https://www.facebook.com"><img src="{{asset('img/icons/Intersection_4.png') }}"/></a>
          </div>
          <div class="col-2">
            <a href="https://twitter.com"><img src="{{asset('img/icons/Intersection_5.png') }}"/></a>
          </div>
          <div class="col-2">
            <a href="https://www.youtube.com"><img src="{{asset('img/icons/Intersection_6.png') }}"/></a>
          </div>
          <div class="col-2">
            <a href="https://api.whatsapp.com"><img src="{{asset('img/icons/Intersection_7.png') }}"/></a>
          </div>
          <div class="col-2">
            <a href="https://plus.google.com"><img src="{{asset('img/icons/Intersection_8.png') }}"/></a>
          </div>
          <div class="col-2">
            <a href="https://feedburner.google.com"><img src="{{asset('img/icons/Intersection_9.png') }}"/></a>
          </div>         
        </div>      
      </div>
    </section>
  </main>
  <script>
    function search()
    {
      window.location.href="{{url('/search')}}";
    }
  </script>
  @endsection

