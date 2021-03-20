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
                <div class="grid_order_item">
                    <div class="order_item_content">
                        <img src="{{asset('img/icons/icon-calendar-big.png') }}" alt=""> 
                        <p>メニュー選択</p>
                    </div>
                </div>
            </div>
            <div class="col-4 pb-30 lr-20">
                <div class="grid_order_item before-none">
                    <div class="order_item_content">
                        <img src="{{asset('img/icons/icon-check-big.png') }}" alt=""> 
                        <p>メニュー選択</p>
                    </div>
                </div>
            </div>
    
        </div>
        <div class="row mb-30">
            <div class="col-lg-12">
              <h2 class="order_title_h2" data-aos="fade-up" data-aos-delay="50">日付選択</h2>
              <h3 class="order_sub_title_h3" data-aos="fade-up" data-aos-delay="100">次なる社会を創り出そう。</h3>
              <div class="order_title_bar" data-aos="fade-up" data-aos-delay="100"><p>選択中のスタイリスト</p></div>
              <p class="order_reference" data-aos="fade-up" data-aos-delay="100">【ネット予約 or 電話予約でも OK】</p>
              @if(!is_null($hairdresser_information))
              <div class="order_personal_info" data-aos="fade-up" data-aos-delay="150">
                <img src="{{asset($hairdresser_information->profile_photo)}}" alt=""> 
                <div class="personal_info">
                    <div class="info_content">
                        <p>{{$hairdresser_information->name}}</p>
                        <p><strong>{{$hairdresser_information->name_m}}</strong></p>
                        <p><span class="station">{{$hairdresser_information->parkinglot}}</span><span class="access">{{$hairdresser_information->routestation}}</span></p>
                    </div>
                </div>
              </div>
              @endif
            </div>
        </div>
        <div id="order_card">
            <div class="card_header just-center" data-aos="fade-up" data-aos-delay="100">
                <div class="date_content">
                    <p class="text-right"><span id="selected_count_menu">0</span>件選択中</p>
                </div>
            </div>
            <div class="card_body">
                <div class="reverse_content">
                    @forelse($menu_list as $menu_item)
                    <div class="reverse_checkbox_item" data-aos="fade-up" data-aos-delay="100">
                        <div class="lr-15">
                            <label class="checkbox_container">
                                <div class="reverse_info_content">
                                    <h3>{{$menu_item->name}}</h3>
                                    <div class="reverse_info">
                                        <p>詳細：<span>{{$menu_item->explanation}}</span></p>
                                    </div>
                                    <div class="reverse_price">
                                        ¥<span>{{$menu_item->amount}}</span>
                                    </div>
                                </div>
                                <input type="checkbox" id="{{$menu_item->id}}" onchange="selectMenuItem(this)">
                                <span class="order_checkmark"></span>
                            </label>
                        </div>
                    </div>
                    @empty
                    <p class="text-center help">データが存在しません。</p>
                    @endforelse
                </div>
                
            </div>
            <div class="card_footer" data-aos="fade-up" data-aos-delay="100"></div>
            <div class="text-center order_button mt-45" data-aos="fade-up" data-aos-delay="150">
                <form id="select_menu" method="POST" action="{{url('reservation_step_one')}}" onsubmit="reservationFirstStep()">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="selected_menus" id="selected_menus" value="">
                    <input type="hidden" name="hairdresser_id" id="hairdresser_id" value="{{$hairdresser_id}}">
                    <button type="submit" class="btn button-deep-black">メニューを確定する</button>
                </form>
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

    var selected_count_menu = 0;
    $('#selected_menus').val('');
    
    function selectMenuItem(element) {
        console.log(element.checked);
        if (element.checked) {
            selected_count_menu ++;
        }else{
            selected_count_menu --
        }
        initCount();
    }

    function initCount() {
        $('#selected_count_menu').html(selected_count_menu);
    }

    function reservationFirstStep() {
        var menu_checkbox_list = $('.reverse_content input[type="checkbox"]');
        var selected_menu_value = '';
        for (var index = 0; index < menu_checkbox_list.length; index++) {
            var menu_item = menu_checkbox_list[index];
            if (menu_item.checked) {
                selected_menu_value += menu_item.id + ",";
            }
        }
        if(selected_menu_value == '') {
            event.preventDefault();
            toastr['error']('選択されたデータがありません。');
            return false;
        }
        selected_menus = selected_menu_value.substring(0, selected_menu_value.length - 1);
        $('#selected_menus').val(selected_menus);
        return true;
    }
</script>
@endsection
