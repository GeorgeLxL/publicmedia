@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('content')
  <div class="height-90"></div>
  <main id="main">

    <section id="main_order">
      <div class="container max-width-500" data-aos="fade-up">
        <div class="section-header-01">
          <p class="mb-0"><img class="head_logo" src="{{asset('img/logo-big.png') }}" alt="" title=""></p>
        </div>
        <div class="login_form_container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-30">
                  <input type="email" class="default_text {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="メールアドレス" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group mb-15">
                  <input type="password" class="default_text {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="パスワード" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="checkbox text-center mb-15">
                    <label class="checkbox_container">次回より自動ログイン
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="order_checkmark"></span>
                    </label>
                </div>
                <div class="text-center order_button" data-aos="fade-up" data-aos-delay="150">
                    <button type="submit" class="btn login-button-black mb-30">ログイン</button>
                    <a class="lost_pass_link" href="{{ route('password.request') }}">パスワードを忘れた場合?</a>
                    <a href="/login/google" class="btn social_login_button btn-google mb-30">Googleアカウントでログイン</a>
                    <a href="/login/linkedin" class="btn social_login_button btn-line mb-30">Lineアカウントでログイン</a>
                    <a href="/login/twitter" class="btn social_login_button btn-twitter mb-30">Twitterアカウントでログイン</a>
                    <a href="/login/facebook" class="btn social_login_button btn-facebook mb-30">Facebookアカウントでログイン</a>
                      
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

    function goInputRegister() {
      window.location.href = "/register_page";
    }

    function goInputLoginPage() {
      window.location.href = "{{ route('login') }}";
    }
</script>
@endsection