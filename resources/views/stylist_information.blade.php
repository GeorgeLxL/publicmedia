@extends('layouts.userheader')
@section('content') 

  <div class="container">

    <div class="row">
      <div class="col-lg-12">
          <img src="{{ asset('img/home-topimage.png') }}" style="margin-left:5%; width:85%">
          <div class="main_btn">
            <div class="text-area"><a href="#">ヘアスタイルをチェックする</a> </div>
          </div>
      </div>
    </div>

    <div class="row" style="margin-top: 80px; margin-bottom: 20px;">
      <div class="col-6" style="text-align: right; padding-right: 20px;">
          <a class="btn btn-black" href="#">スタイリスト情報</a>
      </div>
      <div class="col-6" style="text-align: left; padding-left: 20px;">
        <a class="btn btn-black" href="#">エリア情報</a>
      </div>
    </div>

    <div class="row" style="margin-bottom: 20px;">
      <div class="col-12" style="text-align: center">
        <img style="width:150px; height:150px; border-radius: 50%; border: solid 1px black;" width="100px" height="100px" src="{{ asset('img/image/スタイリスト１.jpg') }}">
      </div>
    </div>

    <div class="row" style="margin-bottom: 20px;">
      <div style="margin-left:20%; width:60%; border:solid 1px black;">
        <div style="margin-left: 20px; display: block;">●グラデーションカラー</div>
        <div style="margin-left: 20px; display: block;">●グラデーションカラー</div>
        <div style="margin-left: 20px; display: block;">●グラデーションカラー</div>
      </div>
    </div>
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-12" style="text-align: center;">
        <a class="btn btn-black" href="#">予約する</a>
      </div>
    </div>

    <div class="full-middle">

      <div class="row">
          <div class="card card-default" style="border-radius:20px; margin-bottom: 10px;">
            <div class="card-header" style="text-align: left; padding: 3px; border-radius: 19px 19px 0 0; background-color: #EBEBEB;"> サロン情報</div>
              <div class="card-body" style="padding:5px 0 5px 0;">
                  <div class="row">
                    <div class="col-6" style="padding-right: 0px;">
                      <img class="shop-photo" src="{{ asset('/img/image/サロン１.jpg') }}">
                    </div>
                    <div  class="col-6" style="padding-left: 0px;">
                      <img class="shop-photo" src="{{ asset('img/image/サロン２.jpg') }}">
                    </div>
                  </div>
              </div>
            <div class="card-footer" style="height: 15px; padding: 3px; border-radius: 0px 0px 19px 19px; background-color: #EBEBEB;"></div>
          </div>
      </div>           
      
      <div class="card card-default" style="border-radius:20px; margin-bottom: 10px;">
        <div class="card-header" style="text-align: left;  padding: 3px; border-radius: 19px 19px 0 0; background-color: #EBEBEB;"> 美容室パブリックメディア</div>
          <div class="card-body stylist-table">
            <table >
              <tr>
                  <td style="width: 40%; text-align: left;">住所</td>
                  <td></td>
              </tr>
              <tr>
                  <td style="width: 40%; text-align: left;">電話番号</td>
                  <td></td>
              </tr>
              <tr>
                  <td style="width: 40%; text-align: left;">営業時間</td>
                  <td></td>
              </tr>
              <tr>
                  <td style="width: 40%; text-align: left;">定休日</td>
                  <td></td>
              </tr>
              <tr>
                  <td style="width: 40%; text-align: left;">利用可能カード</td>
                  <td></td>
              </tr>
              <tr>
                  <td style="width: 40%; text-align: left;">こだわり</td>
                  <td></td>
              </tr>
              </table>
          </div>
        <div class="card-footer" style="height: 15px; padding: 3px; border-radius: 0px 0px 19px 19px; background-color: #EBEBEB;"></div>
      </div>
   
      <div class="card card-default" style="border-radius:20px; margin-bottom: 10px;">
        <div class="card-header" style="text-align: left; padding: 3px; border-radius: 19px 19px 0 0; background-color: #EBEBEB;"> 〇〇さんの投稿</div>
          <div class="card-body">
              <div class="row">
                  <div class="layout-hairstyle1">
                    <div class="item1">
                       <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/ボブ５.jpg') }}"></a>
                    </div>
                    <div class="item2">
                       <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/ボブ２.jpg') }}"></a>
                    </div>
                    <div class="item3">
                       <a href="#"><img style="width: 100%; height: 100%;"src="{{ asset('img/image/ボブ４.jpg') }}"></a>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="layout-hairstyle2">
                    <div class="item1">
                       <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/ロング１.jpg') }}"></a>
                    </div>
                    <div class="item2">
                       <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/ミディアム３.jpg') }}"></a>
                    </div>
                    <div class="item3">
                       <a href="#"><img style="width: 100%; height: 100%;"src="{{ asset('img/image/ミディアム２.jpg') }}"></a>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="layout-hairstyle1">
                  <div class="item1">
                     <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/スタイリスト１.jpg') }}"></a>
                  </div>
                  <div class="item2">
                     <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/スタイリスト２.jpg') }}"></a>
                  </div>
                  <div class="item3">
                     <a href="#"><img style="width: 100%; height: 100%;"src="{{ asset('img/image/ボブ３.jpg') }}"></a>
                  </div>
                </div>
              </div>

            </div>
        <div class="card-footer" style="height: 15px; padding: 3px; border-radius: 0px 0px 19px 19px; background-color: #EBEBEB;"></div>
      </div>

      <div class="row" style="margin-top: 80px; margin-bottom: 20px;">
        <div class="col-6" style="text-align: right; padding-right: 20px;">
            <a class="btn btn-black" href="#">戻る</a>
        </div>
        <div class="col-6" style="text-align: left; padding-left: 20px;">
          <a class="btn btn-black" href="#">予約する</a>
        </div>
      </div>

    </div>
    
  </div>
@endsection