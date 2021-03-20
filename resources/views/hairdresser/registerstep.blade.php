@extends('layouts.header')

@section('content')
   
    <div class="container">
       
        
        <div class="row">
            <div class="col-lg-12" style="color:#8D6654;">
                <div class="steper-container">
                    <ul class="progressbar">
                        <li class="step active">ユーザー登録</li>
                        <li class="step">インスタ連携</li>
                        <li class="step">完了</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12" style="color:#8D6654;">
                <form id="registerform" class="form" method="post" action="/registercheck">
                @csrf
                    <div id="register1">
                        <div class="form-row">
                            <label for="name_m" class="col-md-3" style="text-align: right; padding-right: 5px;">お名前（漢字）</label>
                            <div class="form-group col-md-7">
                            <input onclick="clear_error()" type="text" class="form-control" name="name_m" id="name_m" placeholder="佐藤太郎" data-rule="text" data-msg="Please enter name">
                            <div class="validate"></div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="form-group col-md-3"></div>
                            <span id="error_name_m" style="color: red;"></span>
                        </div>
                        <div class="form-row">
                            <label for="name_s" class="col-md-3" style="text-align: right; padding-right: 5px;">お名前（かな）</label>
                            <div class="form-group col-md-7">
                            <input onclick="clear_error()" type="text" class="form-control" name="name_s" id="name_s" placeholder="さとうたろう" data-rule="text" data-msg="Please enter name">
                            <div class="validate"></div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="form-group col-md-3"></div>
                            <span id="error_name_s" style="color: red;"></span>
                        </div>
                        <div class="form-row">
                            <label for="email" class="col-md-3" style="text-align: right; padding-right: 5px;">メールアドレス</label>
                            <div class="form-group col-md-7">
                            <input onclick="clear_error()" type="email" class="form-control" name="email" id="email" placeholder="info@stapic.jp" data-rule="email" data-msg="Please enter a valid email">
                            <div class="validate"></div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="form-group col-md-3"></div>
                            <span id="error_email" style="color: red;"></span>
                        </div>
                        <div class="form-row">
                            <label for="password" class="col-md-3" style="text-align: right; padding-right: 5px;">パスワード</label>
                            <div class="form-group col-md-7">
                            <input onclick="clear_error()" type="password" class="form-control" name="password" id="password">
                            <span id="error_password" style="color: red;"></span>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="form-group col-md-3"></div>
                            
                        </div>

                        <div class="form-row">
                            <label for="confirm" class="col-md-3" style="text-align: right; padding-right: 5px;">パスワード確認</label>
                            <div class="form-group col-md-7">
                            <input onclick="clear_error()" type="password" class="form-control" name="confirm" id="confirm">
                            <span id="error_confirm" style="color: red;"></span>
                            <div class="validate"></div>
                            </div>
                            <div class="col-md-2"></div>
                           
                        </div>
                        <div class="full-middle">
                            <label>
                                <input type="checkbox" name="save" id="save">
                                利用規約に同意する 
                            </label>
                            <button id="firststepbtn" type="button" class="btn-confirm mb-3">登録する</button>
                            <div style="display: block;">
                                <a href="/adminlogin"> <p  style="color: black; margin: 10px 10px 10px 10px;"><u>登録済みの方はこちら</u></p></a>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div id="register2">
                        <div class="form-row">
                            <label for="name_s" class="col-md-3" style="text-align: right; padding-right: 5px;">選択してください</label>
                            <div class="form-group col-md-7">
                                <div style="display: flex;">
                                    <div style="width:50%;">
                                        <label>
                                            <input type="radio" name="belong" value="0" checked="checked">
                                            会社所属
                                        </label>
                                    </div>
                                    <div style="width:50%;">
                                        <label>
                                            <input type="radio" name="belong" value="1">
                                            フリーランス
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-row" id="shopdiv">
                            <label for="shopname" class="col-md-3" style="text-align: right; padding-right: 5px;">所属している店舗名を記入ください</label>
                            <div class="form-group col-md-7">
                            <input type="text" class="form-control" name="shopname" id="shopname" placeholder="店舗名を入力">
                            <div class="validate"></div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-row">
                            <label for="shoparea" class="col-md-3" style="text-align: right; padding-right: 5px;">店舗のエリアを選択してください</label>
                                <select class="form-group col-md-2" id="area">
                                    <option value="0"></option>
                                    @foreach($areadata as $area)
                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                    @endforeach
                                </select>
                                <label class="col-md-1">道</label>
                                <select class="form-group col-md-2" id="county">
                                </select>
                                <label class="col-md-2">県</label>
                            <div class="validate"></div>
                            </div>
                            <div class="col-md-2
                            "></div>
                        </div>
                        <div class="full-middle">
                            <button type="submit" class="btn-confirm mb-3">連携する</button>
                            <div style="display: block;">
                                <a href="/adminlogin"><p  style="color: black; margin: 10px 10px 10px 10px;"><u>登錄済みの方はこちら</u></p></a>
                                <br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var data;

        $(document).ready(function() {
            $("#register2").hide();
        });

        $('#firststepbtn').click(function(){
            if($('#name_m').val()=="") $('#error_name_m').html("お名前（漢字）を入力してください");
            if($('#name_s').val()=="") $('#error_name_s').html("お名前（漢字）を入力してください");
            if($('#email').val()=="") $('#error_email').html("メールアドレスを入力してください");
            if($('#password').val()=="") $('#error_password').html("パスワードを入力してください");
            if($('#password').val()!= $('#confirm').val()) $('#error_confirm').html("正しいパスワードを入力してください");
            if($('#name_m').val()=="" || $('#name_s').val()=="" || $('#email').val()=="" || $('#password').val()==""|| $('#password').val()!= $('#confirm').val())return false;
            
            var steps=document.getElementsByClassName("step");
            steps[0].className = steps[0].className.replace(" active","");
            steps[1].className += " active"
            $("#register1").hide();
            $("#register2").show();        
        
        });

        function clear_error()
        {
            $('#error_name_m').html("");
            $('#error_name_s').html("");
            $('#error_email').html("");
            $('#error_password').html("");
            $('#error_confirm').html("");     
        }

        $("#area").change(function(){
            let areaid= $("#area").val();
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
                        var j = i + 1;
                        countynames+="<option value="+ parseInt(result[i]['id']) +">"+result[i]['name'] +"</option>";
                    }
                    $("#county").html(countynames);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });

        $("#registerform").submit(function(e){
            e.preventDefault();
            let name_m = $('#name_m').val();
            let name_s = $('#name_s').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let user_id = $('#ID').val();
            let shopname = $('#shopname').val();
            let shoparea =  $("#county").val();            
            let company = $('input[name=belong]:checked').val();
            $.ajax({
                    type : 'POST',
                    url : "{{ url('/registercheck') }}",
                    data :   {
                        _token: "{{ csrf_token() }}",
                        name_m:name_m,
                        name_s:name_s,
                        email:email,
                        password:password,
                        user_id:user_id,
                        shopname:shopname,
                        shoparea:shoparea,
                        company:company
                    },
                    success: function(result){
                        if(result=="true")window.location.href="{{url('/adminhome')}}";
                        else alert(result);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });
    });

    </script>
@endsection