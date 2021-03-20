@extends('layouts.header')
@section('title','login')
@section('content')



<div class="container" style="padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card card-default" style="margin-top:30px">
                <div class="card-header">ログアウトしました。</div>
                <div class="card-body">
                    <form id="loginform" method="POST" action="{{url('/logincheck')}}">
                        <div class="form-group row">
                            <label for="email" class="col-sm-12 col-form-label">メールアドレス</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">バスワード</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 次回から省塔
                            </label>
                        </div>
                        <button type="submit" class="btn-send mb-3">送  信</button>
                        <br>     
                        <a class="btn btn-link" href="/adminregister">
                            新規登録
                        </a>
                        <br>
                        <a class="btn btn-link" href="#">
                            パスワード再発行
                        </a>
                        <br>
                        <a class="btn btn-link" href="#">
                            本登録のメールが届かない場合
                        </a>
                        <br>            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
 
    $("#loginform").submit(function(e){
        e.preventDefault();
        let email = $('#email').val();
        let password = $('#password').val();
        
        $.ajax({
                type : 'POST',
                url : "{{ url('/logincheck') }}",
                data :   {
                    _token: "{{ csrf_token() }}",
                    email:email,
                    password:password,
                },
                success: function(result){
                  
                if(result=="admin")
                {
                    window.location.href="{{url('/superadmin')}}";
                }
                else if(result=="true")
                {
                    window.location.href="{{url('/adminhome')}}";
                }
                else 
                {
                    alert(result);
                }
                   
                
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
    });
</script>

@endsection