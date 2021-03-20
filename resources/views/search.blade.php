@extends('layouts.userheader')
@section('content') 
  <main id="main" style="background-color: white;">
    <div class="container">
      <div class="section-header-02" style="padding-top:20px; margin-bottom: 5px;">
        <h2 class="section-title" ><span style="padding-left: 3 0px;">リアルヘアカタログ</span></h2>
      </div>
      <div class="full-middle">
        <img src="{{ asset('img/logo.png') }}">
      </div>
      <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('img/search-topimage.png') }}" style="margin-left:25%; margin-top: -30px; width:50%">
        </div>
      </div>
    </div> 

      <div class="container max-width-900" data-aos="fade-up">
        <div class="section-header-02">
          <h2 class="section-title"><img src="{{ asset('img/icons/icon_label.png') }}"/><span>エリアを選ぶ</span></h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="radio" name="hairstyle" value="1">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="radio" name="hairstyle" value="2">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="radio" name="hairstyle" value="3">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="radio" name="hairstyle" value="4">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="radio" name="hairstyle" value="5">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="radio" name="hairstyle" value="6">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>           
        </div>

        <div class="arrow-button-content"><img src="assets/img/icons/icon_bottom_arrow_red.png"/></div>
        <div class="section-header-02">
          <h2 class="section-title"><img src="assets/img/icons/icon_fly.png"/><span>ヘアスタイルを選ぶ</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="checkbox">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="checkbox">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="checkbox">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="checkbox">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="checkbox">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="grid_item">
              <label class="check_box_item">
                <input type="checkbox">
                <span class="checkmark">
                  <img src="{{ asset('img/hair-style/short.png') }}" class="img-fluid" alt="">
                </span>
              </label>
              <p>表参道</p>
            </div>
          </div>           
        </div>
        <div class="search-button-content mt-45 mb-30">
          <div class="search"><button type="button" class="btn btn-black shadow-8">この条件で検索</button></div>
          <a class="link" href="#about">リセット</a>
        </div>
      </div>

@endsection