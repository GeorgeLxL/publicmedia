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
        <div class="row order_container" data-aos="fade-up" data-aos-delay="100">
            <div class="col-4 pb-30 lr-20">
                <div class="grid_order_item active">
                    <div class="order_item_content">
                        <img src="{{asset('img/icons/icon-lists-big.png') }}" alt=""> 
                        <p>メニュー選択</p>
                    </div>
                </div>
            </div>
            <div class="col-4 pb-30 lr-20">
                <div class="grid_order_item active">
                    <div class="order_item_content">
                        <img src="{{asset('img/icons/icon-calendar-big.png') }}" alt=""> 
                        <p>メニュー選択</p>
                    </div>
                </div>
            </div>
            <div class="col-4 pb-30 lr-20">
                <div class="grid_order_item before-none active">
                    <div class="order_item_content">
                        <img src="{{asset('img/icons/icon-check-big.png') }}" alt=""> 
                        <p>メニュー選択</p>
                    </div>
                </div>
            </div>
    
        </div>
        <div class="row">
            <div class="col-lg-12">
              <h2 class="order_title_h2" data-aos="fade-up" data-aos-delay="50">予約確認</h2>
              <h3 class="order_sub_title_h3" data-aos="fade-up" data-aos-delay="100">以下の内容でよろしければ「予約」を押してください。</h3>
              <div class="order_title_bar" data-aos="fade-up" data-aos-delay="100"><p>選択中のメニュー</p></div>
              <p class="order_reference" data-aos="fade-up" data-aos-delay="100">【ネット予約 or 電話予約でも OK】</p>
            </div>
        </div>
        @if(!is_null($hairdresser_information))
        <div id="order_card">
            <div class="card_header_rect" data-aos="fade-up" data-aos-delay="100"></div>
            <div class="card_body">
                <div class="container">
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">お店</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$hairdresser_information->name}}</p>
                        </div>
                    </div>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">スタイリスト</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$hairdresser_information->name_m}}</p>
                        </div>
                    </div>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">電話番号</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$hairdresser_information->telephone}}</p>
                        </div>
                    </div>
                    <?php
                        $menu_count = 0;
                        $total_amount = 0;
                    ?>
                    @forelse($selected_menu_list as $menu_item)
                    <?php
                        $menu_count ++;
                        $total_amount += (int)$menu_item->amount;
                    ?>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">メニュー({{$menu_count}})</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$menu_item->name}}</p>
                        </div>
                    </div>
                    @empty
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">メニュー</p>
                        </div>
                        <div class="col-10">
                            <p class="text-center help">選択されたメニューがありません。</p>
                        </div>
                    </div>
                    @endforelse
                    <?php
                        $day_count = 0;
                    ?>
                    @forelse($seleted_days_list as $seleted_day)
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            @if($day_count == 0)
                            <p class="name">第一希望</p>
                            @elseif($day_count == 1)
                            <p class="name">第二希望</p>
                            @elseif($day_count == 2)
                            <p class="name">第三希望</p>
                            @endif
                        </div>
                        <div class="col-10">
                            <p class="des">{{$seleted_day}}</p>
                        </div>
                    </div>
                    <?php
                        $day_count ++;
                    ?>
                    @empty
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">第一希望</p>
                        </div>
                        <div class="col-10">
                            <p class="text-center help">選択された日付がありません。</p>
                        </div>
                    </div>
                    @endforelse
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">備考</p>
                        </div>
                        <div class="col-10">
                            <p class="des">{{$message}}</p>
                        </div>
                    </div>
                    <div class="row reserve-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-2">
                            <p class="name">合計</p>
                        </div>
                        <div class="col-10">
                            <p class="des total_price"><span>{{$total_amount}}</span>円</p>
                        </div>
                    </div>
                    <p class="help-inline">※ 後ほど、担当者より予約日をお知らせさせていただき。</p>
                </div>
            </div>
            <div class="card_footer" data-aos="fade-up" data-aos-delay="100">
                
            </div>
            <div class="text-center order_button mt-45" data-aos="fade-up" data-aos-delay="100">
                <button type="button" class="btn button-light-black" onclick="historyBack()">戻る</button>
                @guest
                <button type="button" class="btn button-deep-black" onclick="goLoginPage()">ログイン</button>
                @else
                <button type="button" class="btn button-deep-black" onclick="completeReservation()">ログインして予約</button>
                @endguest
            </div>
        </div>
        @endif
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
    function completeReservation() {
        $.ajax({
            type : 'POST',
            url : "{{ url('/complete_reservation') }}",
            data :   {
                _token: "{{ csrf_token() }}",
                reservation_complete_confirm: "true"
            },
            success: function(res) {
                if (res.success == 'true') {
                    <?php
                        Session::forget('reservation_status');    
                    ?>
                    alert('成功裏に予約されました。');
                    window.location.href = "{{url('/')}}";
                }
            }
        });
    }

    function goLoginPage() {
        <?php
            Session::put('reservation_status', 1);    
        ?>
        window.location.href = "{{route('login')}}";
    }
</script>
@endsection
