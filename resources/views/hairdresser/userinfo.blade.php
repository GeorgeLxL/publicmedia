@extends('layouts.header1')
@section('title','account')
@section('content')
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11"  style="padding-top: 50px; margin-bottom:30px">
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        ユーザネーム
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            {{$userdata->username}}
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        名前
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        {{$userdata->name}}
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        メールアドレス
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        {{$userdata->email}}
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        プロフィール写真
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            <img src="{{asset($userdata->photo)}}" width="200px" height="200px">
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        メッセージ
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        {{$userdata->message}}
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        予約者へのメッセージ 
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        {{$userdata->message_booker}}
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        予約完了時のメッセージ
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        {{$userdata->message_completed}}
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        指名料
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        {{$userdata->fee}} 
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            特徴
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                        @php
                        $features=array("カットが得意","カラーが得意", "パーマが得意" ,"髪質改善が得意", "トリートメント得意", "くせ毛悩み解決", "少人数のお店", "個室/半個室", "お洒落な店内", "メンズおすすめ", "お子様連れOK");
                        @endphp 
                        @foreach (explode("/",$userdata->feature) as $letter)
                            {{$features[intval($letter)]." / "}}
                        @endforeach
                         
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            雇用形牘
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                    
                            {{ $userdata->employ_status==1 ? '会社員' : 'フリーランス'}}
                        
                        </div>
                        <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            公式キャンペーン
                        </div>
                        <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            {{ $userdata->campaign==1 ? '適用させる': '適用外'}}
                        </div>

                        <div class="col-md-12" style="font-size:15px; margin:10px 10px 10px 10px">
                            <div class="row">
                                <div class="col-sm-12">
                                   <center><a href="/edit_account"  class="btn-send mb-3" style="float:right; margin-right:20px">編集する</a></center>
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection