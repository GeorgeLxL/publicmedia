@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('content')
<div class="space-70 pc"></div>
  <main id="main_service">

    <!-- ======= Intro Section ======= -->
    <section id="intro" class="service_intro">
        <div class="intro-container" data-aos="zoom-in" data-aos-delay="100">
            <p><img class="logo_white" src="{{asset('img/logo-white_big.svg') }}" alt="logo"></p>
            <h1 class="page-title mb-4 pb-0">リアルヘア</h1>
        </div>
    </section>
    <!-- End Intro Section -->

    <section id="speakers" class="pt-90">
        <div class="container pc-lr-8 max-width-700" data-aos="fade-up">
          <div class="section-header-02">
            <h2 class="section-title"><img src="{{asset('img/icons/icon_label.png') }}"/><span>エリアを選ぶ</span></h2>
          </div>
          <div class="search_section">
              <div class="container">
                @php
                $container_id = 0;
                $i=0;
                @endphp
                @foreach($hair_style_list as $hair_style_item)
                @if($i % 9 == 0) 
                @php
                $container_id ++;
                @endphp
                  <div class="row mb-30">
                    <div class="col-1"><a id="prev" href="javascript:;"><img id="{{$container_id}}" gid="prev" src="{{asset('img/icons/icon_left_arrow_blue.png') }}"/></a></div>
                    <div class="col-10">
                        <div class="search_row">
                            <div id="search_container_0{{$container_id}}" class="search_container">
                @endif
                @if($i % 3 == 0) 
                                <section class="hair_style_group">
                                    <div class="row">
                @endif
                                        <div class="col-4">
                                            <div class="grid_item">
                                                <label class="check_box_item">
                                                <!-- <input type="checkbox"> -->
                                                <input type="radio" name="radio" id="{{$hair_style_item->id}}">
                                                <span class="checkmark">
                                                    <img src="{{asset($hair_style_item->image) }}" class="img-fluid" alt="$hair_style_item->type">
                                                </span>
                                                </label>
                                                <p>{{$hair_style_item->type}}</p>
                                            </div>
                                        </div>
                @if($i % 3 == 2) 
                                    </div>
                                </section>
                @endif
                @if($i % 9 == 8) 
                            </div>
                        </div>
                    </div>
                    <div class="col-1"><a id="next" href="javascript:;"><img id="{{$container_id}}" gid="next" src="{{asset('img/icons/icon_right_arrow_blue.png') }}"/></a></div>
                  </div>
                @endif
                @php
                $i ++;
                @endphp
                @endforeach
                @if($i % 3 != 0) 
                                    </div>
                                </section>
                @endif
                @if($i % 9 != 0) 
                            </div>
                        </div>
                    </div>
                    <div class="col-1"><a id="next" href="javascript:;"><img id="{{$container_id}}" gid="next" src="{{asset('img/icons/icon_right_arrow_blue.png') }}"/></a></div>
                  </div>
                @endif
              </div>
          </div>
          <div class="arrow-button-content mt-60"><img src="{{asset('img/icons/icon_bottom_arrow_red.png') }}"/></div>
          <div class="section-header-02">
             <h2 class="section-title"><img src="{{asset('img/icons/icon_fly.png') }}"/><span>ヘアスタイルを選ぶ</span></h2>
          </div>
          <div class="search_section">
            <div class="container">
                @php
                $j=0;
                @endphp
                @foreach($area_list as $area_item)
                @if($j % 9 == 0) 
                @php
                $container_id ++;
                @endphp
                <div class="row mb-30">
                  <div class="col-1"><a id="prev" href="javascript:;"><img id="{{$container_id}}" gid="prev" src="{{asset('img/icons/icon_left_arrow_blue.png') }}"/></a></div>
                  <div class="col-10">
                      <div class="search_row">
                          <div id="search_container_0{{$container_id}}" class="search_container">
                @endif
                @if($j % 3 == 0) 
                                <section class="hair_style_group">
                                    <div class="row">
                @endif
                                      <div class="col-4">
                                          <div class="grid_item" id="grid_area_item_{{$area_item->id}}" <?php if($area_item->sub_area_count != 0) {?> onclick="show_search_content_modal({{$area_item->id }})" <?php } ?> >
                                              <label class="check_box_item">
                                              <input type="checkbox" id="grid_area_checkbox_{{$area_item->id}}" data-gid="{{(int)$area_item->id}}">
                                              <span class="checkmark">
                                                  <img src="{{asset($area_item->image) }}" class="img-fluid" alt="{{asset($area_item->name) }}">
                                              </span>
                                              </label>
                                              <p>{{$area_item->name}}</p>
                                          </div>
                                      </div>
                @if($j % 3 == 2) 
                                    </div>
                                </section>
                @endif
                @if($j % 9 == 8) 
                            </div>
                        </div>
                    </div>
                    <div class="col-1"><a id="next" href="javascript:;"><img id="{{$container_id}}" gid="next" src="{{asset('img/icons/icon_right_arrow_blue.png') }}"/></a></div>
                  </div>
                @endif
                @php
                $j ++;
                @endphp
                @endforeach
                @if($j % 3 != 0) 
                                    </div>
                                </section>
                @endif
                @if($j % 9 != 0) 
                            </div>
                        </div>
                    </div>
                    <div class="col-1"><a id="next" href="javascript:;"><img id="{{$container_id}}" gid="next" src="{{asset('img/icons/icon_right_arrow_blue.png') }}"/></a></div>
                  </div>
                @endif

            </div>
          </div>
          
          <div class="search-button-content mt-45 mb-30">
            <form id="search_hair_style_form" method="POST" action="{{url('search_result')}}" onsubmit="hairStyleSearch()">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="selected_hair_style" id="selected_hair_style" value="">
                <input type="hidden" name="selected_areas" id="selected_areas" value="">
                <div class="search"><button type="submit" class="btn btn-black shadow-8">この条件で検索</button></div>
                <a class="link" href="javascript:;" onclick="initCheckStatus()">リセット</a>
            </form>
          </div>
        </div>
        <!-- Modal Order Form -->
        <div id="buy-ticket-modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container modal_container">
                            <div class="modal-section-header">
                                <h2><span>エリアを選ぶ</span></h2>
                            </div>
                            <input type="hidden" name="checked_sub_areas" id="checked_sub_areas" value="">
                            <div class="row" id="sub_area_content"></div>
                            <div class="modal_bottom_line"></div>
                            <div class="text-center mb-30">
                                <button type="button" onclick="checkSubArea()" class="btn button-deep-black">こので決定</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

  </main>
@endsection

@section('script')
<script>
    $(document).ready(function () {
    var speed = 3000;
    var slides = $('.hair_style_group');
    var container = [], elm = [];
    var container_count = <?=$container_id; ?>;
    for (var i = 1; i <= container_count; i++) {
        container[i] = $('#search_container_0' + i);
        elm[i] = container[i].find(':first-child').prop("tagName");
        var item_width = container[i].width();
        slides.width(item_width); 
        container[i].parent().width(item_width);
        container[i].width(slides.length * item_width); 
        // alert(container[i].find(elm[i]).length);
        container[i].find(elm[i] + ':first').before(container[i].find(elm[i] + ':last'));
        if(container[i].find(elm[i]).length != 1) {
            resetSlides(i);
        }
    }
    
    
    $('.search_section .col-1 a').click(function (e) {
        var search_section_id = Number(e.target.id);
        if(container[search_section_id].find(elm[search_section_id]).length == 1) {
            return false;
        }
        if(this.id == 'prev') {
            
            if (container[search_section_id].is(':animated')) {
                return false;
            }
            container[search_section_id].stop().animate({
                'left': 0
            }, 1500, function () {
                container[search_section_id].find(elm[search_section_id] + ':first').before(container[search_section_id].find(elm[search_section_id] + ':last'));
                resetSlides(search_section_id);
            });
        }
        else {
            if (container[search_section_id].is(':animated')) {
                return false;
            }
            container[search_section_id].stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container[search_section_id].find(elm[search_section_id] + ':last').after(container[search_section_id].find(elm[search_section_id] + ':first'));
                resetSlides(search_section_id);
            });
        }
        return false;
    });

    initCheckStatus();

    function resetSlides(index) {
        container[index].css({
            'left': -1 * item_width
        });
    }
    
});

//format
$('#selected_hair_style').val('');
$('#selected_areas').val('');

function show_search_content_modal(parent_id) {
    event.preventDefault();
    var parent_id = Number(parent_id);
    var main_area_checkbox = $('#grid_area_item_'+parent_id+' input[type="checkbox"]')[0];
    $.ajax({
        type : 'POST',
        url : "{{ url('/get_sub_area_list') }}",
        data :   {
            _token: "{{ csrf_token() }}",
            parent_id:parent_id
        },
        success: function(res) {
            // var result = JSON.parse(res);
            if (res.length > 0) {
                $('#buy-ticket-modal').modal();
                $('#buy-ticket-modal #checked_sub_areas').val(parent_id);
                var html_str = '';
                for (var i = 0; i < res.length; i++) {
                    html_str += '<div class="col-4"><div class="grid_item"><label class="check_box_item">';
                    html_str += '<input type="checkbox" id='+res[i].id+' ';
                    if(main_area_checkbox.dataset.gid.indexOf(res[i].id) > -1) {
                        html_str += 'checked';
                    }
                    html_str += '>'
                    html_str += '<span class="checkmark">';
                    html_str += '<img src="'+res[i].image+'" class="img-fluid" alt="'+res[i].name+'">';
                    html_str += '</span>';
                    html_str += '</label>';
                    html_str += '<p>'+res[i].name+'</p>';
                    html_str += '</div></div>';
                    
                }
                $('#sub_area_content').html(html_str);
            }
        }
    });
    
}

function checkSubArea() {
    var parent_id = Number($('#buy-ticket-modal #checked_sub_areas').val());
    var sub_area_list = $('#buy-ticket-modal input[type="checkbox"]');
    var checked_area_value = '';
    for (var index = 0; index < sub_area_list.length; index++) {
        var sub_area_element = sub_area_list[index];
        if (sub_area_element.checked) {
            checked_area_value += Number(sub_area_element.id) + ",";
        }
    }
    var main_area_checkbox = $('#grid_area_item_'+parent_id+' input[type="checkbox"]')[0];
    if (checked_area_value != '') {
        main_area_checkbox.dataset.gid = checked_area_value.substring(0, checked_area_value.length - 1);
        main_area_checkbox.checked = true;
    }
    else {
        main_area_checkbox.dataset.gid = parent_id;
        main_area_checkbox.checked = false;
    }
    $('#buy-ticket-modal').modal('hide');
    return false;
}

function hairStyleSearch() {
    var hair_style_list = $('.search_section input[type="radio"]');
    for (var index = 0; index < hair_style_list.length; index++) {
        var style_element = hair_style_list[index];
        if (style_element.checked) {
            $('#selected_hair_style').val(Number(style_element.id));
        }
    }
    var area_list = $('.search_section input[type="checkbox"]');
    var selected_area_value = '';
    for (var index = 0; index < area_list.length; index++) {
        var area_element = area_list[index];
        if (area_element.checked) {
            selected_area_value += area_element.dataset.gid + ",";
        }
    }
    $('#selected_areas').val(selected_area_value.substring(0, selected_area_value.length - 1));
}

function initCheckStatus() {
    var sub_area_list = $('.search_section input[type="checkbox"]');
    for (var index = 0; index < sub_area_list.length; index++) {
        var sub_area_element = sub_area_list[index];
        sub_area_element.checked = false;
        sub_area_element.dataset.gid = sub_area_element.id;
    }
    var hair_style_list = $('.search_section input[type="radio"]');
    for (var index = 0; index < hair_style_list.length; index++) {
        var style_element = hair_style_list[index];
        style_element.checked = false;
    }
}

</script>
@endsection