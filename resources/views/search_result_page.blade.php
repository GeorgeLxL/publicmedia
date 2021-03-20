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
        <?php
            $background_color = 'bg-color-light-purple';
            $symbol_icon_image = 'haira_style_woman.png';
        ?>
        @if(!is_null($search_info['hair_style']) & $search_info['hair_style']->gender == 1)
        <?php
            $background_color = 'bg-color-light-blue';
            $symbol_icon_image = 'haira_style_man.png';
        ?>
        @endif
        <div class="search_result_title_bar {{$background_color}} mb-30" data-aos="fade-up" data-aos-delay="50">
            <p>なりたい髪型を叶える<br/>美容師予約ヘアカタログ</p>
        </div>
        
        @if(!is_null($search_info['hair_style']) || count($search_info['areas_name_list']) > 0)
        <div class="row mb-30">
            <div class="col-lg-12">
              <div class="search_result_info" data-aos="fade-up" data-aos-delay="150">
                <img src="{{asset('img/icons/'.$symbol_icon_image) }}" alt=""> 
                <div class="personal_info">
                    <div class="info_content">
                        <p>{{$search_info['hair_style']->type?$search_info['hair_style']->type: 'すべてのヘアスタイル'}}</p>
                        <p>
                        @if(count($search_info['areas_name_list']) > 0)
                            <?php $area_names_str = '';?>
                            @foreach($search_info['areas_name_list'] as $area_item)
                                <?php $area_names_str .= $area_item->name.', ';?>
                            @endforeach
                            <span class="address">{{substr($area_names_str, 0, strlen($area_names_str) - 2)}}</span>
                        @endif
                        </p>
                    </div>
                </div>
              </div>
            </div>
        </div>
        @endif
        <div id="order_card">
            <div class="card_header {{$background_color}}" data-aos="fade-up" data-aos-delay="100"></div>
            <div class="card_body">
                <section id="venue" class="pt-0 pb-0">
                    <div class="container-fluid venue-gallery-container lr-0 mb-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="row no-gutters">
                            @forelse($search_result_list as $result_item)
                            <div class="col-md-4 col-6">
                                <div class="venue-gallery">
                                <a href="{{url('hair_style_detail/'.$result_item->id)}}">
                                    <img src="{{asset($result_item->image)}}" alt="" class="img-fluid">
                                </a>
                                @guest
                                @else
                                <span id="favorite_icon_{{$result_item->id}}" class="favorite_setting {{(int)trim($result_item->customer_id) == (int)Auth::user()->id?'favorite_active':''}}" onclick="favoriteActive({{$result_item->id}})"></span>
                                @endguest
                                </div>
                            </div>
                            @empty
                            <p class="text-center help">何の検索結果はありません。</p>
                            @endforelse
                
                        </div>
                    </div>
                </section>
                
            </div>
            <div class="card_footer {{$background_color}}" data-aos="fade-up" data-aos-delay="100"></div>
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