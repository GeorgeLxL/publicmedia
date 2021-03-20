@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('content')
<div class="height-90"></div>
<main id="main">
    <section id="main_order">
      <div class="container max-width-600" data-aos="fade-up">
        <div class="section-header-01">
          <p class="mb-0"><img class="head_logo" src="{{asset('img/logo-big.png') }}" alt="" title=""></p>
        </div>
        @if(!is_null($image_infomation))
        <section id="venue" class="pt-0 pb-0 mb-30 border-color-brown">
            <div class="container-fluid venue-gallery-container lr-0 mb-0" data-aos="fade-up" data-aos-delay="100">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="venue-gallery">
                        <a href="{{asset($image_infomation->image)}}" class="venobox" data-gall="venue-gallery">
                            <img src="{{asset($image_infomation->image)}}" alt="" class="img-fluid">
                        </a>
                        @guest
                        @else
                        <span style="position: absolute; top: 15px; left: 15px; height: 40px; width: 40px;" id="favorite_icon_{{$image_infomation->id}}" class="favorite_setting {{(int)trim($image_infomation->customer_id) == (int)Auth::user()->id?'favorite_active':''}}" onclick="favoriteActive({{$image_infomation->id}})"></span>
                        @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <div class="row mb-30">
            <div class="col-lg-12">
              <div class="order_title_bar" data-aos="fade-up" data-aos-delay="100"><p>スタイリスト情報</p></div>
              @if(!is_null($hairdresser_information))
              <div class="order_personal_info mb-15" data-aos="fade-up" data-aos-delay="150">
                <img src="{{asset($hairdresser_information->profile_photo)}}" alt=""> 
                <div class="personal_info">
                    <div class="info_content">
                        <p>{{$hairdresser_information->name}}</p>
                        <p><strong>{{$hairdresser_information->name_m}}</strong></p>
                        <p><span class="station">{{$hairdresser_information->parkinglot}}</span><span class="access">{{$hairdresser_information->routestation}}</span></p>
                    </div>
                </div>
              </div>
              
              <p class="order_reference" data-aos="fade-up" data-aos-delay="100">
                {{$hairdresser_information->message}}
              </p>
              @endif
              <div class="text-center order_button mt-30" data-aos="fade-up" data-aos-delay="150">
                <button type="button" onclick="showReservationPage({{$image_infomation->user_id}})" class="btn button-deep-black">予約する</button>
              </div>
            </div>
        </div>
        <div id="order_card" class="mb-30">
            <div class="card_header" data-aos="fade-up" data-aos-delay="100">
                <div class="date_content">
                    <p>サロン情報</p>
                </div>
            </div>
            <div class="card_body">
                <section id="venue" class="pt-0 pb-0">
                    <div class="container-fluid venue-gallery-container lr-0 mb-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="row no-gutters">
                        @if(!is_null($hairdresser_information->atmosphere1))
                            <div class="col-md-4 col-6">
                                <div class="venue-gallery">
                                <a href="{{asset($hairdresser_information->atmosphere1)}}" class="venobox" data-gall="venue-gallery">
                                    <img src="{{asset($hairdresser_information->atmosphere1)}}" alt="" class="img-fluid">
                                </a>
                                </div>
                            </div>
                        @endif
                        @if(!is_null($hairdresser_information->atmosphere2))
                            <div class="col-md-4 col-6">
                                <div class="venue-gallery">
                                <a href="{{asset($hairdresser_information->atmosphere2)}}" class="venobox" data-gall="venue-gallery">
                                    <img src="{{asset($hairdresser_information->atmosphere2)}}" alt="" class="img-fluid">
                                </a>
                                </div>
                            </div>
                        @endif
                        @if(!is_null($hairdresser_information->atmosphere3))
                            <div class="col-md-4 col-6">
                                <div class="venue-gallery">
                                <a href="{{asset($hairdresser_information->atmosphere3)}}" class="venobox" data-gall="venue-gallery">
                                    <img src="{{asset($hairdresser_information->atmosphere3)}}" alt="" class="img-fluid">
                                </a>
                                </div>
                            </div>
                        @endif
                
                        </div>
                    </div>
                </section>
                
            </div>
            <div class="card_footer" data-aos="fade-up" data-aos-delay="100"></div>
          </div>
          @if(!is_null($hairdresser_information))
          <div id="order_card" class="mb-30">
            <div class="card_header" data-aos="fade-up" data-aos-delay="100">
                <div class="date_content">
                    <p>美容室パブリックメディア</p>
                </div>
            </div>
            <div class="card_body" data-aos="fade-up" data-aos-delay="100">
                <div class="container">
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">名前</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$hairdresser_information->name_m}}</p>
                        </div>
                    </div>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">営業時間</p>
                        </div>
                        <div class="col-10">
                            <p class="des">月火水木金 {{$hairdresser_information->opentime}}~{{$hairdresser_information->closetime}} [{{$image_infomation->name}}]</p>
                        </div>
                    </div>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">定休日</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$hairdresser_information->holiday}}</p>
                        </div>
                    </div>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">利用可能カード</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$hairdresser_information->card}}</p>
                        </div>
                    </div>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">こだわり条件</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$hairdresser_information->commitment}}</p>
                        </div>
                    </div>
                    <!-- <p class="help-inline">※ 後ほど、担当者より予約日をお知らせさせていただき。</p> -->
                </div>
            </div>
            <div class="card_footer" data-aos="fade-up" data-aos-delay="100">
                
            </div>
          </div>
          @endif

        <div id="order_card">
            <div class="card_header" data-aos="fade-up" data-aos-delay="100">
                <div class="date_content">
                    <p>{{$hairdresser_information->name_m}}さんの投稿</p>
                </div>
            </div>
            <div class="card_body">
                <section id="venue" class="pt-0 pb-0">
                    <div class="container-fluid venue-gallery-container lr-0 mb-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="row no-gutters">
                            @forelse($related_images_list as $result_item)
                            <div class="col-md-4 col-6">
                                <div class="venue-gallery">
                                <a href="{{asset($result_item->image)}}" class="venobox" data-gall="venue-gallery">
                                    <img src="{{asset($result_item->image)}}" alt="" class="img-fluid">
                                </a>
                                @guest
                                @else
                                <span id="favorite_icon_{{$result_item->id}}" class="favorite_setting {{(int)trim($result_item->customer_id) == (int)Auth::user()->id?'favorite_active':''}}" onclick="favoriteActive({{$result_item->id}})"></span>
                                @endguest
                                </div>
                            </div>
                            @empty
                            <p class="text-center">何の検索結果はありません。</p>
                            @endforelse
                    
                        </div>
                    </div>
                </section>
                
            </div>
            <div class="card_footer" data-aos="fade-up" data-aos-delay="100"></div>
        </div>
        <div class="text-center order_button mt-45" data-aos="fade-up" data-aos-delay="100">
            <button type="button" onclick="historyBack()" class="btn button-light-black">戻る</button>
            <button type="button" onclick="showReservationPage({{$image_infomation->user_id}})" class="btn button-deep-black">予約する</button>
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

  function showReservationPage(hairdresser_id) {
    window.location.href = "{{url('reservation')}}" + "?id="+Number(hairdresser_id);
  }

  function favoriteActive(image_id) {
    event.preventDefault();
    var image_id = image_id;
    if($('#favorite_icon_' + image_id).hasClass('favorite_active')) {
      toastr['error']('すでにお気に入りリストに追加されています。');
      return false;
    }
    $.ajax({
        type : 'POST',
        url : "{{ url('favorite_active') }}",
        data :   {
            _token: "{{ csrf_token() }}",
            image_id:image_id
        },
        success: function(res) {
            if(res.success == 'true') {
              $('#favorite_icon_' + image_id).addClass('favorite_active');
            }
        }
    });
  }
</script>
@endsection