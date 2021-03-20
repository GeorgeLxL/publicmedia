@extends('layouts.userheader')
@section('title','ヘアスタイル')
@section('content')
  <div class="height-90"></div>
  <main id="main">

    <section id="main_order">
      <div class="container max-width-500" data-aos="fade-up">
        <div class="section-header-02 mb-15">
          <h2 class="section-title"><span>ようこそ!</span></h2>
        </div>
        <div class="section-header-01">
          <p class="mb-0"><img class="head_logo" src="{{asset('img/logo-big.png') }}" alt="" title=""></p>
        </div>
        <div class="order_title_bar mb-30" data-aos="fade-up"><p>登録に成功しました。</p></div>
        <div class="login_form_container">
            <form method="POST" action="{{ route('password.email') }}">
                <div class="text-center order_button" data-aos="fade-up">
                    <button type="button" onclick="goLoginPage()" class="btn login-button-black mb-30">ログインページに移動</button>
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

    function goLoginPage() {
        window.location.href = "{{route('login')}}"
    }
</script>
@endsection