@extends('layouts.header1')
@section('title','ResetPassword')
@section('content')
<div class="container" style="margin-top:50px; padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">パスワード変更</div>

                <div class="card-body">
                <span id='success' style="color:green"></span>
                <form id="changepassword" method="POST" action="{{ url('/changepassword')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">新しいバスワード</label>
                            <div class="col-md-12">
                                <input onclick="clearerror()" id="password" type="password" class="form-control" name="password" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label">新しいバスワード（磴認用）</label>
                            <div class="col-md-12">
                                <input onclick="clearerror()" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <span id='error_password' style="color:red"></span>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-12" style="text-align:center; margin-top:20px;">
                                <button type="submit" class="btn-send mb-3" style=" margin-right:20px">メニューグループを編集する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#changepassword").submit(function(e){
        e.preventDefault();
        let password = $('#password').val();
        let password_confirmation = $('#password-confirm').val();
        if(password!=password_confirmation)
        {
            $("#error_password").html("正しいパスワードを入力してください");
            return false;
        }
        
        $.ajax({
                type : 'POST',
                url : "{{ url('/changepassword') }}",
                data :   {
                    _token: "{{ csrf_token() }}",
                    password:password,
                },
                success: function(result){
                   if(result=="true")
                   {
                    $("#success").html("パスワードを更新しました");
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

    function clearerror()
    {
        $("#error_password").html("");
    }

</script>

@endsection
