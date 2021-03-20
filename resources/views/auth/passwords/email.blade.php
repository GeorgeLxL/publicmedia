@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('content')
  <div class="height-90"></div>
  <main id="main">

    <section id="main_order">
      <div class="container max-width-500" data-aos="fade-up">
        <div class="section-header-02 mb-15">
          <h2 class="section-title"><span>パスワードを再設定する</span></h2>
        </div>
        <div class="section-header-01">
          <p class="mb-0"><img class="head_logo" src="{{asset('img/logo-big.png') }}" alt="" title=""></p>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="login_form_container">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group mb-30">
                  <input type="email" class="default_text {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="メールアドレス" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="text-center order_button" data-aos="fade-up">
                    <button type="submit" class="btn login-button-black mb-30">パスワードリセットリンクの送信</button>
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
</script>
@endsection