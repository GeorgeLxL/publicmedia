@extends('layouts.header1')
@section('title','account')
@section('content')
   
<div class="container" style="padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-lg-11"  style="padding-top: 50px;">
            <div class="card card-default">
                <div class="card-body">
                    <form id="account_edit_form" action="{{url('/save_account')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            ユーザネーム
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                               <input style="width: 100%;" type="text" id="user_id" name="user_id" value="{{$userdata->username}}">
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            名前
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input style="width: 100%;" type="text" id="name" name="name" value="{{$userdata->name}}">                            
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            メールアドレス
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input style="width: 100%;" type="text" id="email" name="email" value="{{$userdata->email}}"> 
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            プロフィール写真
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <label>
                                    <input onchange="readURL(this,'avatar')" type="file" id="profile_photo" name="profile_photo"  hidden>
                                    <img id="avatar" name="avatar" src="{{asset($userdata->photo)}}" width="200px" height="200px">
                                </label>
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            メッセージ
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input style="width: 100%;" type="text" id="message" name="message" value="{{$userdata->message}}"> 
                               
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            予約者へのメッセージ 
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input style="width: 100%;" type="text" id="message_booker" name="message_booker" value="{{$userdata->message_booker}}"> 
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            予約完了時のメッセージ
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input style="width: 100%;" type="text" id="message_completed" name="message_completed" value="{{$userdata->message_completed}}">
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                            指名料
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input style="width: 100%;" type="text" id="nomination_fee" name="nomination_fee" value="{{$userdata->fee}} ">                           
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                特徴
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input hidden type="text" id="features" name="features" value="{{$userdata->feature}}"> 
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">カットが得意</label></span>
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">カラーが得意</label></span>  
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">パーマが得意</label></span>  
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">髪質改善が得意</label></span>  
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">トリートメント得意</label></span>  
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">くせ毛悩み解決</label></span>  
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">少人数のお店</label></span>                           
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">個室/半個室</label></span>  
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">お洒落な店内</label></span>
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">メンズおすすめ</label></span>  
                                <span style="margin-right: 20px;"><label><input type="checkbox" class="feature">お子様連れOK</label></span>
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                雇用形牘
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input hidden type="text" id="employ_statusval" name="employ_statusval" value="{{$userdata->employ_status}}">
                                <select name="eployment_status" id="eployment_status">
                                    <option value="0">会社員</option>
                                    <option value="1">フリーランス</option>
                                </select>                            
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                公式キャンペーン
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px; margin-bottom:10px">
                                <input hidden type="text" id="campaignval" name="campaignval" value="{{$userdata->campaign}}"> 
                                <label><input type="checkbox" name="campaign" id="campaign">キャンペーンを適用しない</label>
                                <br>
                                （店舗の規定等により割引などのキャンペーンに参加できない場合にはこちらにチェック下さい。）
                            </div>
                            <div class="col-md-12" style="font-size:15px; margin:10px 10px 10px 10px">
                                
                              <center> <button type="submit" class="btn-send mb-3">保存する</button></center>
                              
                            </div>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     $(document).ready(function(){
        
        var employ_statusval = parseInt(document.getElementById("employ_statusval").value);
        var options = document.getElementsByTagName("option");
        options[employ_statusval].setAttribute('selected',true);
        var featurechecks = document.getElementsByClassName("feature");
        var features = document.getElementById("features").value.split("/");
        for (var i = 0; i < features.length-1; i++) {
            featurechecks[parseInt(features[i])].setAttribute("checked", true);
        }
        var campaignval =  document.getElementById("campaignval").value;
        if(campaignval == 0)
        {
            document.getElementById("campaign").setAttribute("checked", true);
        }
     });


     $('form').submit(function(event) {
        event.preventDefault();
      
        var featurechecks = document.getElementsByClassName("feature");
        var featureval="";
        for (var i = 0; i < featurechecks.length; i++) {
            if (featurechecks[i].checked) {
                featureval+=i;
                featureval+="/"
            }
        }
        document.getElementById("features").value=featureval;
        var formdata = new FormData(this);
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        xhttp = new XMLHttpRequest();
       
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText ==="true"){
                    window.location.href="/account"
                };
            }
        };
        xhttp.open("POST", "{{ url('/save_account') }}", true);
        xhttp.send(formdata);
    });

    function readURL(input,img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + img).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
      
@endsection