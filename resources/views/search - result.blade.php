@extends('layouts.userheader')
@section('content')  
      <div class="container">
        <div class="full-middle">
          <img src="{{ asset('img/logo.png') }}">
        </div>

        <div class="page-title">
           <div>なりたい髪型を叶える</div>
           <div>美容師予約ヘアカタログ</div>   
        </div>
        <div class="full-middle">
          <div class="hairstyle">
            <div class="row">
              <div class='col-6'>
                <img style="width: 50px;height: 50px; border-radius:50%; border-width: 1px; border-style: solid;" src="{{asset('img/hairstyle-long.png') }}">
              </div>
              <div class='col-6'>
                <div style="text-align: right; white-space: nowrap;" class="type">
                  ロング
                </div>
                <div style="text-align: right;" class="location">
                  北海道
                </div>
              </div>
            </div>
          </div>
        <div class="card card-default" style="border-radius:20px;">
          <div class="card-header" style="height:15px; padding: 3px; border-radius: 19px 19px 0 0; background-color: #FFDCF9;"></div>
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
                        <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/ボブ４.jpg') }}"></a>
                      </div>
                      <div class="item2">
                        <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset('img/image/ミディアム３.jpg') }}"></a>
                      </div>
                      <div class="item3">
                        <a href="#"><img style="width: 100%; height: 100%;"src="{{ asset('img/image/ミディアム２.jpg') }}"></a>
                      </div>
                    </div>
                </div>
            </div>
          <div class="card-footer" style="height: 15px; padding: 3px; border-radius: 0px 0px 19px 19px; background-color: #FFDCF9;"></div>
        </div>
        </div>
      </div>  
@endsection