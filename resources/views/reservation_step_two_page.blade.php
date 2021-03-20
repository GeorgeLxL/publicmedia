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
        <form action="{{url('reservation_step_two')}}" method="POST" role="form" class="php-email-form" onsubmit="reservationStepTwo()">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="selected_days" id="selected_days" value="">
            <div class="card_header" data-aos="fade-up" data-aos-delay="100">
                <div class="date_content">
                <?php
                    $dt = date('Y-m-d');
                    $show_date_string = date('Y年 m月'); 
                    $show_month_day_string_01 = date('Y年 m月');
                    $show_month_day_string_02 = date('Y年 m月');
                    $last_date = (int)date("t", strtotime($dt));
                    $current_date = (int)date('d');
                    $today_week_id = date('w');
                    function getWeekInfo($week_id = 0) {
                        if($week_id % 7 == 0) return "日";
                        elseif($week_id % 7 == 1) return "火";
                        elseif($week_id % 7 == 2) return "火";
                        elseif($week_id % 7 == 3) return "水";
                        elseif($week_id % 7 == 4) return "木";
                        elseif($week_id % 7 == 5) return "金";
                        elseif($week_id % 7 == 6) return "土";
                    }
                    if($last_date - $current_date <= 3) {
                        $show_date_string = date('Y年 m月')." ~ ".date('Y年 m月', strtotime('+1 month', strtotime($dt)));
                    }
                    if($last_date - $current_date <= 7) {
                        $show_month_day_string_01 = date('Y年 m月')." ~ ".date('Y年 m月', strtotime('+1 month', strtotime($dt)));
                        $show_month_day_string_02 = date('Y年 m月', strtotime('+1 month', strtotime($dt)));
                    }
                    if($last_date - $current_date <= 14) {
                        $show_month_day_string_02 = date('Y年 m月')." ~ ".date('Y年 m月', strtotime('+1 month', strtotime($dt)));
                    }
                ?>
                    <p id="display_month_day_01">{{$show_date_string}}</p>
                </div>
                <div class="tab_content">
                    <div class="order_table_slider_button">
                        <a id="order_table_prev" href="#"><i class="fa fa-angle-left"></i></a><span>今日行</span><a id="order_table_next" class="active" href="#"><i class="fa fa-angle-right"></i></a> 
                    </div>
                </div>
            </div>
            <div class="card_body" data-aos="fade-up" data-aos-delay="100">
                <div id="order_slides" class="order_table_content">
                    <div class="slide">
                        <table>
                            <thead>
                                <tr>
                                    <th width="33.33333%">今日</th>
                                    <th width="33.33333%">明日</th>
                                    <th width="33.33334%">明後日</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $hour = 9;
                                    $minute = 0;
                                ?>
                                @for($i = 0; $i < 19; $i ++)
                                <?php
                                    if($i % 2 == 0) {
                                        $hour ++;
                                        $minute = '00';
                                    }else{
                                        $minute = '30';
                                    }
                                ?>
                                <tr>
                                    <td id="today_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日')}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="tomorrow_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+1 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="aftertomorrow_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+2 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                </tr>
                                @endfor
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="33.33333%">今日</th>
                                    <th width="33.33333%">明日</th>
                                    <th width="33.33334%">明後日</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="slide">
                        <table>
                            <thead>
                                <tr>
                                    <th class="week_name {{((int)$today_week_id + 1) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 1) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+1 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 1)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 2) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 2) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+2 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 2)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 3) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 3) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+3 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 3)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 4) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 4) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+4 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 4)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 5) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 5) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+5 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 5)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 6) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 6) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+6 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 6)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 7) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 7) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+7 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 7)}})</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $hour = 9;
                                    $minute = 0;
                                ?>
                                @for($i = 0; $i < 19; $i ++)
                                <?php
                                    if($i % 2 == 0) {
                                        $hour ++;
                                        $minute = '00';
                                    }else{
                                        $minute = '30';
                                    }
                                ?>
                                <tr>
                                    <td id="{{date('Y-m-d', strtotime('+1 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+1 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+2 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+2 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+3 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+3 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+4 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+4 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+5 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+5 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+6 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+6 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+7 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+7 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                </tr>
                                @endfor
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="week_name {{((int)$today_week_id + 1) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 1) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+1 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 1)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 2) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 2) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+2 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 2)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 3) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 3) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+3 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 3)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 4) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 4) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+4 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 4)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 5) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 5) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+5 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 5)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 6) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 6) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+6 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 6)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 7) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 7) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+7 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 7)}})</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="slide">
                        <table>
                            <thead>
                                <tr>
                                    <th class="week_name {{((int)$today_week_id + 1) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 1) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+8 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 1)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 2) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 2) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+9 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 2)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 3) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 3) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+10 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 3)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 4) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 4) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+11 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 4)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 5) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 5) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+12 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 5)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 6) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 6) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+13 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 6)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 7) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 7) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+14 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 7)}})</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $hour = 9;
                                    $minute = 0;
                                ?>
                                @for($i = 0; $i < 19; $i ++)
                                <?php
                                    if($i % 2 == 0) {
                                        $hour ++;
                                        $minute = '00';
                                    }else{
                                        $minute = '30';
                                    }
                                ?>
                                <tr>
                                    <td id="{{date('Y-m-d', strtotime('+8 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+8 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+9 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+9 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+10 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+10 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+11 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+11 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+12 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+12 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+13 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+13 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                    <td id="{{date('Y-m-d', strtotime('+14 day', strtotime($dt)))}}_{{$hour}}-{{$minute}}" data-gid="{{date('Y年m月d日', strtotime('+14 day', strtotime($dt)))}} {{$hour}}:{{$minute}}">{{$hour}}:{{$minute}}</td>
                                </tr>
                                @endfor
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="week_name {{((int)$today_week_id + 1) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 1) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+8 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 1)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 2) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 2) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+9 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 2)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 3) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 3) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+10 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 3)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 4) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 4) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+11 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 4)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 5) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 5) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+12 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 5)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 6) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 6) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+13 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 6)}})</th>
                                    <th class="week_name {{((int)$today_week_id + 7) % 7 == 6?'week_date_active_blue':(((int)$today_week_id + 7) % 7 == 0?'week_date_active_red':'')}}" width="100/7%">{{date('d', strtotime('+14 day', strtotime($dt)))}}<br/>({{getWeekInfo((int)$today_week_id + 7)}})</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card_header" data-aos="fade-up" data-aos-delay="100">
                    <div class="date_content">
                        <p id="display_month_day_02">{{$show_date_string}}</p>
                    </div>
                    <div class="tab_content">
                        <div class="order_table_slider_button">
                            <a id="order_table_prev_2" href="#"><i class="fa fa-angle-left"></i></a><span>今日行</span><a id="order_table_next_2" class="active" href="#"><i class="fa fa-angle-right"></i></a> 
                        </div>
                    </div>
                </div>
                <div class="order_title_bar bg-white" data-aos="fade-up" data-aos-delay="100"><p>選択中のスタイリスト</p></div>
                <div id="order_content_bar" class="order_content_bar" data-aos="fade-up" data-aos-delay="100"></div>
                <div class="order_title_bar bg-white" data-aos="fade-up" data-aos-delay="100"><p>備考</p></div>
                <div class="order_leave_text_content" data-aos="fade-up" data-aos-delay="100">
                    <div class="form-group">
                        <textarea class="default_text width-100" name="message" rows="5" data-rule="required" data-msg="私たちのために何か書いてください。" placeholder="例) 肌が弱いのでカラーの相談をしたい。"></textarea>
                        <div class="validate"></div>
                    </div>
                </div>
            </div>
            <div class="card_footer" data-aos="fade-up" data-aos-delay="100">
                
            </div>
            <div class="text-center order_button mt-45" data-aos="fade-up" data-aos-delay="150">
                <button type="button" class="btn button-light-black" onclick="historyBack()">戻る</button>
                <button type="submit" class="btn button-deep-black">予約の確認</button>
            </div>
        </form>
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

    var order_count_num = 0;
    var active_days = new Array();

    $(document).ready(function () {
        var speed = 5000;
        var current_display_month_step = 0;
        var slides = $('#order_slides .slide');
        var container = $('#order_slides');
        var elm = container.find(':first-child').prop("tagName");
        var item_width = container.width();
        order_count_num = 0;
        active_days = new Array();
        $('#selected_days').val();
        $("#order_slides table td").removeClass('active');
        $('#order_content_bar').append('<p>選択された予約日がありません。</p>');
        slides.width(item_width); 
        container.parent().width(item_width);
        container.width(slides.length * item_width); 
        container.find(elm + ':first').before(container.find(elm + ':last'));
        resetSlides();

        $('#order_table_prev').click(function (e) {
            current_display_month_step ++;
            if (container.is(':animated')) {
                return false;
            }
            container.stop().animate({
                'left': 0
            }, 1500, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
            return false;
        });
        $('#order_table_next').click(function (e) {
            current_display_month_step --;
            if (container.is(':animated')) {
                return false;
            }
            container.stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
            return false;
        });
        $('#order_table_prev_2').click(function (e) {
            e.preventDefault();
            $('#order_table_prev').click();
        });
        $('#order_table_next_2').click(function (e) {
            e.preventDefault();
            $('#order_table_next').click();
        });

        function resetSlides() {
            var display_month_str = '{{$show_date_string}}';
            if(Math.abs(current_display_month_step % 3) == 1) {
                display_month_str = '{{$show_month_day_string_01}}';
            } else if(Math.abs(current_display_month_step % 3) == 2) {
                display_month_str = '{{$show_month_day_string_02}}';
            }
            $('#display_month_day_01').html(display_month_str);
            $('#display_month_day_02').html(display_month_str);
            container.css({
                'left': -1 * item_width
            });
        }

        $("#order_slides table td").click(function(e) {

            if($(this).hasClass('active')) {
                e.preventDefault();
                return false;
            }
            if(order_count_num >= 3) {
                e.preventDefault();
                toastr['error']('予約日は3個まで追加できます。');
                return false;
            }
            e.target.setAttribute("class","active");
            active_days.push(this.dataset.gid);
            if(order_count_num == 0) {
                $('#order_content_bar').empty();
            }
            order_count_num ++;
            $('#order_content_bar').append('<p><span>第'+order_count_num+'希望：</span>'+this.dataset.gid+'<span data-gid="'+this.id+'" class="order_cancel_button"></span></p>');

        });
        
    });

    $(document).on('click', '#order_content_bar .order_cancel_button', function (e) {
        e.preventDefault();
        $(this).parent('p').remove();
        $('#' + this.dataset.gid).removeClass('active');
        order_count_num --;
        if(order_count_num == 0) {
            $('#order_content_bar').append('<p>選択された予約日がありません。</p>');
        }
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

    function reservationStepTwo() {
        if(active_days.length == 0) {
            event.preventDefault();
            toastr['error']('選択された予約日がありません。');
            return false;
        }
        var selected_days_str = JSON.stringify(active_days);
        $('#selected_days').val(selected_days_str);
    }

    function historyBack() {
        window.history.back()
    }
</script>
@endsection
