@extends('layouts.header1')
@section('title','home')
@section('page-title')
    <img src="{{asset('img/home.png')}}">
    <span class="title">基本情報</span>
@endsection
@section('content')
   
<div class="container" style="padding-bottom:40px; margin-top:70px">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card card-default">
                <div class="card-header">ログインしました。</div>
                <div class="card-body">
                    <form method="POST" action="/saveshopdata" id="shopform" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#"  onclick="editshopdata()" style="color: #7B8BDC;"><div id="editbtn" class="icon-edit">編集</div></a>
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                店舗名
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                            <input id="name" name="name" type="text" disabled value="{{$shopdata->name}}" style="width:100%; background-color: white; border:none"> 
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                メイン画像
                            </div>
                            <div class="col-md-9" style="text-align:center; border-bottom:1px solid #707070; padding-top:10px;">
                                <label>
                                    <input id="main_image" name="main_image" onchange="readURL(this,'mainimg')" type="file" id="mainimgfile" hidden disabled>
                                    <img id="mainimg" alt="設定されていません" src="{{ asset($shopdata->main_image) }}" width="50%">
                                </label>
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                雰囲気画像（三枚まで）
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <label>
                                    <input id="atmosphere1" name="atmosphere1" onchange="readURL(this,'atmosphere1img')" type="file" hidden disabled>
                                    <img id="atmosphere1img" alt="設定されていません" src="{{ asset($shopdata->atmosphere1) }}" width="90%">
                                </label>    
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <label>
                                    <input id="atmosphere2" name="atmosphere2" onchange="readURL(this,'atmosphere2img')" type="file" hidden disabled>
                                    <img id="atmosphere2img" alt="設定されていません" src="{{ asset($shopdata->atmosphere2) }}" width="90%">
                                </label>                        
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <label>
                                    <input id="atmosphere3" name="atmosphere3" onchange="readURL(this,'atmosphere3img')" type="file"  hidden disabled>
                                    <img id="atmosphere3img" alt="設定されていません" src="{{ asset($shopdata->atmosphere3) }}" width="90%">
                                </label>
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                電話番号
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                            <input id="telephone" name="telephone" type="text" disabled value="{{$shopdata->telephone}}" style="width:100%; background-color: white; border:none">
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                住所
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                            <input id="address" name="address" type="text" disabled value="{{$shopdata->address}}" style="width:100%; background-color: white; border:none">
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                于約受付時間
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="opentime" name="opentime" type="text" disabled value="{{$shopdata->opentime}}" style="width:100%; background-color: white; border:none">
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                            ~ 
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="closetime" name="closetime" type="text" disabled value="{{$shopdata->closetime}}" style="width:100%; background-color: white; border:none"> 
                            </div>
                            
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                営集時間
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                            <input id="gatheringtime" name="gatheringtime" type="text" disabled value="{{$shopdata->gatheringtime}}" style="width:100%; background-color: white; border:none"> 
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                休日
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="holiday" name="holiday" type="text" disabled value="{{$shopdata->holiday}}" style="width:100%; background-color: white; border:none">
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                カット料金
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="fee" name="fee" type="text" disabled value="{{$shopdata->fee}}" style="width:100%; background-color: white; border:none">
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                座席数
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="seatnum" name="seatnum" type="text" disabled value="{{$shopdata->seatnum}}" style="width:100%; background-color: white; border:none">
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                駐車埸
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="parkinglot" name="parkinglot" type="text" disabled value="{{$shopdata->parkinglot}}" style="width:100%; background-color: white; border:none">
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                路線•量寄駅
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="routestation" name="routestation" type="text" disabled value="{{$shopdata->routestation}}" style="width:100%; background-color: white; border:none">
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                アクセス
                            </div>

                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="access" name="access" type="text" disabled value="{{$shopdata->access}}" style="width:100%; background-color: white; border:none">
                            </div>
                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                地域
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="area" name="area" type="text" disabled value="{{$shopdata->area}}" style="width:100%; background-color: white; border:none">
                                <input id="prov" name="prov" type="text" disabled value="{{$shopdata->prov}}" hidden>
                                <input id="county" name="county" type="text" disabled value="{{$shopdata->county}}" hidden>
                                <div class="row" id="select_area_pan">
                                    <select class="col-4" id="area_select">
                                    </select>
                                    <label class="col-2">道</label>
                                    <select class="col-4" id="county_select"><option value="{{$shopdata->county}}">{{$shopdata->area}}</option>
                                    </select>
                                    <label class="col-2">県</label>
                                </div>
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                利用可能カード
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="card" name="card" type="text" disabled value="{{$shopdata->card}}" style="width:100%; background-color: white; border:none">
                            </div>

                            <div class="col-md-3" style="border-bottom:1px solid #707070; padding-top:10px;">
                                こだわり条件
                            </div>
                            <div class="col-md-9" style="border-bottom:1px solid #707070; padding-top:10px;">
                                <input id="commitment" name="commitment" type="text" disabled value="{{$shopdata->commitment}}" style="width:100%; background-color: white; border:none">
                            </div>
                        </div>
                        <button id="submit" type="submit" hidden></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     $(document).ready(function () {
         $("#select_area_pan").hide();
     });

     function getareaData()
     {
        let areaid= $("#prov").val();
            $.ajax({
                type : 'POST',
                url : "{{ url('/getarea') }}",
                data :   {
                    _token: "{{ csrf_token() }}"
                },
                success: function(result){
                    var provename = "";
                    result = JSON.parse(result);
                    for(i=0;i<result.length; i++)
                    {
                        provename+="<option value="+ parseInt(result[i]['id']) +">"+result[i]['name'] +"</option>";
                    }
                    $("#area_select").html(provename);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
     }

     $("#area_select").change(function(){
        let areaid= $("#area_select").val();
            $.ajax({
                type : 'POST',
                url : "{{ url('/getsubarea') }}",
                data :   {
                    _token: "{{ csrf_token() }}",
                    areaid:areaid
                },
                success: function(result){
                    var countynames = "";
                    result = JSON.parse(result);
                    for(i=0;i<result.length; i++)
                    {
                        countynames+="<option value="+ parseInt(result[i]['id']) +">"+result[i]['name'] +"</option>";
                    }
                    $("#county_select").html(countynames);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
     });

    function editshopdata()
    {
        if(document.getElementById('editbtn').className == "icon-edit")
        {
            getareaData();
            document.getElementById('editbtn').className = document.getElementById('editbtn').className.replace("icon-edit", "icon-save");
            document.getElementById('editbtn').innerHTML = "保存";
            $("input").prop('disabled', false);
            $("input").css("border","solid 1px black");
            $("#area").hide();
            $("#select_area_pan").show();

        }
        else{
            $("#submit").click();
        }
    }

    $('form').submit(function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var formdata = new FormData(this);
        formdata.append('county', $("#county_select option:selected").val());
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText ==="true"){
                    document.getElementById('editbtn').className = document.getElementById('editbtn').className.replace("icon-save", "icon-edit");
                    document.getElementById('editbtn').innerHTML = "編集";
                    $("input").prop('disabled', true);
                    $("input").css("border","none");
                    $("#area").val($("#county_select option:selected").text());
                    $("#area").show();
                    $("#select_area_pan").hide();
                };
            }
        };
        xhttp.open("POST", "{{ url('/saveshopdata') }}", true);
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