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
            <form method="POST" action="{{route('register')}}" onsubmit="memberRegister()">
                @csrf
                <div class="form-group mb-30">
                    <label class="mb-2">氏名（カナ）</label><span class="require">*</span>
                    <div class="d-flex">
                        <div class="mr-1">
                            <input placeholder="スタピク" autocomplete="name_kanzi" name="name_kanzi" type="text" id="name_kanzi" class="default_text {{ $errors->has('name_kanzi') ? ' is-invalid' : '' }}" value="{{ old('name_kanzi') }}" required autofocus>
                            @if ($errors->has('name_kanzi'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name_kanzi') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="ml-1">
                            <input placeholder="ハナコ" autocomplete="name_kana" name="name_kana" type="text" id="name_kana" class="default_text {{ $errors->has('name_kana') ? ' is-invalid' : '' }}" value="{{ old('name_kana') }}" required>
                            @if ($errors->has('name_kana'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name_kana') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group mb-30">
                    <label class="mb-2">生年月日 </label><span class="require">*</span>
                    <div class="date_field">
                        <select id="birth_year" name="birth_year" class="year" value="{{ old('birth_year') }}" required>
                            <option value="">--</option> 
                            <?php
                                $current_year = (int)date('Y');
                            ?>
                            @for($i = 0; $i < 100; $i ++)
                            <option value="{{$current_year - $i}}">{{$current_year - $i}}</option> 
                            @endfor
                        </select> 
                        <span>年</span>
                        <select id="birth_month" name="birth_month" class="month" value="{{ old('birth_month') }}" required>
                            <option value="">--</option> 
                            <option value="1">1</option> 
                            <option value="2">2</option> 
                            <option value="3">3</option> 
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option> 
                            <option value="12">12</option>
                        </select> 
                        <span>月</span>
                        <select id="birth_day" name="birth_day" class="day" value="{{ old('birth_day') }}" required>
                            <option value="">--</option> 
                            <option value="1">1</option> 
                            <option value="2">2</option> 
                            <option value="3">3</option> 
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option> 
                            <option value="12">12</option> 
                            <option value="13">13</option> 
                            <option value="14">14</option> 
                            <option value="15">15</option> 
                            <option value="16">16</option> 
                            <option value="17">17</option> 
                            <option value="18">18</option> 
                            <option value="19">19</option> 
                            <option value="20">20</option> 
                            <option value="21">21</option> 
                            <option value="22">22</option> 
                            <option value="23">23</option> 
                            <option value="24">24</option> 
                            <option value="25">25</option> 
                            <option value="26">26</option> 
                            <option value="27">27</option> 
                            <option value="28">28</option> 
                            <option value="29">29</option> 
                            <option value="30">30</option> 
                            <option value="31">31</option>
                        </select> 
                        <span>日</span>
                    </div>
                </div>
                <div class="form-group mb-30">
                    <label class="mb-2">性別 </label><span class="require">*</span>
                    <div class="d-flex">
                        <label class="gender_container">女性
                            <input type="radio" checked="checked" id="gender" name="gender" value="女性">
                            <span class="gender_checkmark"></span>
                        </label>
                        <label class="gender_container">男性
                            <input type="radio" id="gender" name="gender" value="男性">
                            <span class="gender_checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group mb-30">
                    <label class="mb-2">メールアドレス </label><span class="require">*</span>
                    <input placeholder="メールアドレス" autocomplete="email" type="email" name="email" id="email" class="default_text {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label class="mb-2">電話番号 </label><span class="require">*</span>
                    <input placeholder="ハイフンなしで11桁まで" type="text" name="phone_number" id="phone_number" class="default_text {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" value="{{ old('phone_number') }}" required>
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label class="mb-2">パスワード </label><span class="require">*</span>
                    <input placeholder="半角6文字以上" type="password" name="password" id="password" class="default_text {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label class="mb-2">パスワード（確認用）</label><span class="require">*</span>
                    <input placeholder="半角6文字以上" type="password" name="password_confirmation" id="password_confirmation" class="default_text" required>
                </div>
                <div class="checkbox text-center mb-15">
                    <label class="checkbox_container"><a href="{{url('privacy_policy')}}">利用規約</a>に同意する
                        <input type="checkbox" name="privacy_policy" id="privacy_policy">
                        <span class="order_checkmark"></span>
                    </label>
                </div>
                <div class="text-center order_button" data-aos="fade-up" data-aos-delay="150">
                    <button type="submit" class="btn login-button-black mb-30">登 録</button>
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

    function memberRegister() {
      if($('#privacy_policy')[0].checked == false) {
        event.preventDefault();
        toastr['error']('個人情報保護方針を確認してください。');
        return false;
      }
    }

    function goInputLoginPage() {
      event.defaultPrevented();
      window.location.href = "{{ route('login') }}";
    }
</script>
@endsection