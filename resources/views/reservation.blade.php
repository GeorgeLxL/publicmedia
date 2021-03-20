@extends('layouts.userheader')
@section('content')   
  <div class="container">
    <div class="full-middle">
      <img src="{{ asset('img/logo.png') }}">
    </div>
    
    <div class="reserve-layout">
      <ul class="menu_stage">
        <li class="dashed_gold">
          <svg fill="none" height="20" viewBox="0 0 24 24" width="24" class="menu-svg">
            <path clip-rule="evenodd" d="M3 3C1.89543 3 1 3.89543 1 5V19C1 20.1046 1.89543 21 3 21H5V19.875H7V21H21C22.1046 21 23 20.1046 23 19V5C23 3.89543 22.1046 3 21 3H7V4.125H5V3H3ZM5 6.375V8.625H7V6.375H5ZM5 10.875V13.125H7V10.875H5ZM5 15.375V17.625H7V15.375H5Z" fill-rule="evenodd">

            </path>
          </svg>
          <br>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">メニュー選択</font>
          </font><br></li>
          <li class="step">
            <svg fill="none" height="20" viewBox="0 0 24 24" width="24" class="menu-svg">
              <path d="M20 3H19V1H17V3H7V1H5V3H4C2.9 3 2 3.9 2 5V21C2 22.1 2.9 23 4 23H20C21.1 23 22 22.1 22 21V5C22 3.9 21.1 3 20 3ZM20 21H4V8H20V21Z">

              </path>
              <rect height="2" width="2" x="5" y="12"></rect>
              <rect height="2" width="2" x="5" y="16"></rect>
              <rect height="2" width="2" x="9" y="12"></rect>
              <rect height="2" width="2" x="9" y="16"></rect>
              <rect height="2" width="2" x="13" y="12"></rect>
              <rect height="2" width="2" x="13" y="16"></rect>
              <rect height="2" width="2" x="17" y="12"></rect>
              <rect height="2" width="2" x="17" y="16"></rect>
            </svg>
            <br>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">日付選択</font>
            </font>
            <br>
          </li>
          <li class="">
            <svg fill="none" height="20" viewBox="0 0 24 24" width="24" class="menu-svg">
              <path d="M19 3H14.82C14.4 1.84 13.3 1 12 1C10.7 1 9.6 1.84 9.18 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM12 3C12.55 3 13 3.45 13 4C13 4.55 12.55 5 12 5C11.45 5 11 4.55 11 4C11 3.45 11.45 3 12 3ZM14 17H7V15H14V17ZM17 13H7V11H17V13ZM17 9H7V7H17V9Z"></path>
            </svg>
            <br>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">予約確認</font>
            </font><br>
          </li>
      </ul>
      <div class="top_title mb-8 ml-4">メニュー選択</div>
      <div class="title_bar"><p style="margin-bottom:0px;">選択中のスタイリスト</p></div>
      
      <div class="mx-4 my-5" style="margin-bottom: 10px !important;margin-top: 10px !important; ">
        <div class="user_info">
          <div class="user_icon-sm3">
            <a href="/staff/hiro_126">
              <img width="100%" height="100%" src="{{ asset('img/image/ボブ２.jpg') }}">
            </a>
          </div>
          <div class="user_names">
            <div class="staff_feats">

            </div>
            <div class="shop_name">フランチェスカ</div>
            <div class="user_name">村田裕幸</div>
          </div>
          <div class="distance">
            <div class="station">銀座線表参道駅</div>
            <div class="access">表参道駅徒歩2分</div>
          </div>
        </div>
      </div>

      <div class="card card-default" style="border-radius:20px; margin-bottom: 10px;">
        <div class="card-header" style="height: 15px; padding: 3px; border-radius: 19px 19px 0 0; background-color: #EBEBEB;"></div>
          <div class="card-body">
            <div class="cut_menu">
              <div class="cut_menu_wrap">
              <div class="tags ml-7"></div> 
              <div class="check_box">
                <svg fill="none" height="14" viewBox="0 0 14 10" width="14">
                  <path d="M4.57592 7.91045L1.3941 4.77612L0.333496 5.8209L4.57592 10L13.6668 1.04478L12.6062 0L4.57592 7.91045Z" fill="white"></path></svg>
                </div>
                <div class="content ml-7"><!----> 
                  <div class="w-100">
                    <div class="title clamp-2 coupon_title">カット＋透明感カラー＋超音波トリートメント</div> 
                    <div class="desc">
                      <p class="clamp-1">提示条件：<span></span></p> 
                      <p class="clamp-1">利用条件：<span>ロング料金1000〜1500円</span></p>
                    </div>
                  </div> 
                  <div class="price">¥<div class="fee">6,500</div></div>
                </div>
              </div>
            </div>
          </div>
        <div class="card-footer" style="height: 15px; padding: 3px; border-radius: 0px 0px 19px 19px; background-color: #EBEBEB;"></div>
      </div>


    </div>
  </div>  
  @endsection