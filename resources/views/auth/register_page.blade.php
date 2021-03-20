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
        <div class="text-center order_button" data-aos="fade-up">
            <button type="button" onclick="goInputRegister()" class="btn login-button-black btn-mail mb-30">メールアドレスで登録 </button>
        </div>
        <div class="order_title_bar mb-30" data-aos="fade-up"><p>他のアカウントで新規登録</p></div>
        <div class="text-center order_button" data-aos="fade-up">
            <a href="#" class="btn social_login_button btn-google mb-30">Googleアカウントで登録</a>
            <a href="#" class="btn social_login_button btn-line mb-30">Lineアカウントで登録</a>
            <a href="#" class="btn social_login_button btn-twitter mb-30">Twitterアカウントで登録</a>
            <a href="#" class="btn social_login_button btn-facebook mb-30">Facebookアカウントで登録</a>
        </div>
        <div class="text-center order_button" data-aos="fade-up">
            <p class="mb-7">ご登録済みの方</p>
            <button type="button" class="btn button-deep-black" onclick="goInputLoginPage()">ログイン</button>
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
      window.location.href = "{{route('register')}}";
    }

    function goInputLoginPage() {
      window.location.href = "{{ route('login') }}";
    }
</script>
@endsection