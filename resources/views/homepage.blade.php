@extends('layouts.userheader')
@section('title','asd')
@section('content')   
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('img/home-topimage.png') }}" style="margin-left:5%; width:85%">
            <div class="main_btn">
              <div class="text-area"><a href="#">ヘアスタイルをチェックする</a></div>
            </div>
        </div>
      </div>

      <div class="home-content">
        <div class="col-lg-12">
          <div class="row step">
            <div class="col-2">
              <img style="float: right;" src="{{ asset('img/1.png') }}" class="step-img">
            </div>
            <div class="col-8">
                <div class="steptitle">気になる髪型をハッシュタグで検索</div>
                <div class="stepcontent">流行のヘアスタイルやイメチェンしたい髪型を
                  ハッシュタグ検索から探すことができます。</div>
            </div>
            <div class="col-2"></div>
          </div>

          <div class="row step">
            <div class="col-2">
              <img style="float: right;" src="{{ asset('img/2.png') }}" class="step-img">
            </div>
            <div class="col-8">
                <div class="steptitle">行きたいエリアをハッシュタグで検索</div>
                <div class="stepcontent">ハッシュタグからヒットしたヘアスタイルの中から
                  気になる髪型をタップしてみよう。
                  タップするとヘアスタイルの詳細が見れます。</div>
            </div>
            <div class="col-2"></div>
          </div>

          <div class="row step">
            <div class="col-2">
              <img style="float: right;" src="{{ asset('img/3.png') }}" class="step-img">
            </div>
            <div class="col-8">
                <div class="steptitle">気になる髪型を選んでみよう</div>
                <div class="stepcontent">ハッシュタグからヒットしたヘアスタイルの中から
                  気になる髪型をタップしてみよう。
                  タップするとヘアスタイルの詳細が見れます。</div>
            </div>
            <div class="col-2"></div>
          </div>
          
          <div class="row step">
            <div class="col-2">
              <img style="float: right;" src="{{ asset('img/4.png') }}" class="step-img">
            </div>
            <div class="col-8">
                <div class="steptitle">ヘアスタイルを作った美容師を確認</div>
                <div class="stepcontent">ヘアスタイルを作った美容師のプロフィールが確認
                  スタイリストの得意なヘアスタイルなども確認できる
                  ので。お気に入りの美容師を見つけることができます。</div>
            </div>
            <div class="col-2"></div>
          </div>
        </div>
      </div>

      <div class="section-header-02" style="margin-bottom: 5px;">
        <h2 class="section-title" ><span>パブリックメディアを利用する</span></h2>
      </div>
      <div class="row">
        <div class="col-3"></div>
          <div class="col-6" style="text-align: center; margin-bottom: 20px;">
            <a href="#"><img src="{{ asset('img/Intersection1.png') }}" class="social-site-icon"></a>
            <a href="#"><img src="{{ asset('img/Intersection2.png') }}" class="social-site-icon"></a>
            <a href="#"><img src="{{ asset('img/Intersection3.png') }}" class="social-site-icon"></a>
            <a href="#"><img src="{{ asset('img/Intersection4.png') }}" class="social-site-icon"></a>
            <a href="#"><img src="{{ asset('img/Intersection5.png') }}" class="social-site-icon"></a>
            <a href="#"><img src="{{ asset('img/Intersection6.png') }}" class="social-site-icon"></a>
            <a href="#"><img src="{{ asset('img/Intersection7.png') }}" class="social-site-icon"></a>
          </div>
        <div class="col-3">
        </div>
      </div>
    </div>   
@endsection