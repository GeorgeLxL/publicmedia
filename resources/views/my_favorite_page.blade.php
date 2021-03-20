@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('content')
  <div class="height-90"></div>
  <main id="main">

    <section id="main_order">
      <div class="container max-width-500" data-aos="fade-up">
        <div class="section-header-02 mb-15">
          <h2 class="section-title"><span>お気に入りリスト</span></h2>
        </div>
        <div class="section-header-01">
          <p class="mb-0"><img class="head_logo" src="{{asset('img/logo-big.png') }}" alt="" title=""></p>
        </div>
        <div id="no_favorite_date_alert" class="order_title_bar" data-aos="fade-up"><p>お気に入りのデータはありません。</p></div>
        <div id="order_card">
            <div class="card_header bg-color-light-purple" data-aos="fade-up" data-aos-delay="100"></div>
            <div class="card_body">
                <section id="venue" class="pt-0 pb-0">
                    <div class="container-fluid venue-gallery-container lr-0 mb-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="row no-gutters">
                            @forelse($favorite_list as $result_item)
                            <div class="col-md-4 col-6" id="remove_favorite_item_{{$result_item->favorite_id}}">
                                <div class="venue-gallery">
                                <a href="{{url('hair_style_detail/'.$result_item->id)}}">
                                    <img src="{{asset($result_item->image)}}" alt="" class="img-fluid">
                                </a>
                                @guest
                                @else
                                <span class="favorite_remove_icon" onclick="removeFavoriteImage({{$result_item->favorite_id}})"><i class="fa fa-times"></i></span>
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
            <div class="card_footer bg-color-light-purple" data-aos="fade-up" data-aos-delay="100"></div>
          </div>
          <div class="text-center order_button mt-45" data-aos="fade-up" data-aos-delay="100">
                <button type="button" class="btn button-light-black" onclick="historyBack()">戻る</button>
                <button type="submit" class="btn button-deep-black" onclick="search()">検索ページに移動</button>
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
        $('#no_favorite_date_alert').hide();
        if($('.venue-gallery-container .venue-gallery').length == 0) {
            $('#no_favorite_date_alert').show();
            $('#order_card').hide();
        }
    });


    function removeFavoriteImage(favorite_id) {
        event.preventDefault();
        var favorite_id = favorite_id;
        $.ajax({
            type : 'POST',
            url : "{{ url('favorite_remove') }}",
            data :   {
                _token: "{{ csrf_token() }}",
                favorite_id:favorite_id
            },
            success: function(res) {
                if(res.success == 'true') {
                    $('#remove_favorite_item_' + favorite_id).remove();
                    if($('.venue-gallery-container .venue-gallery').length == 0) {
                        $('#no_favorite_date_alert').show();
                        $('#order_card').hide();
                    }
                }
            }
        });
    }
    function historyBack() {
        window.history.back()
    }

    function search()
    {
      window.location.href="{{url('/search')}}";
    }
</script>
@endsection