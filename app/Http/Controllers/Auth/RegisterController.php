<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'register_thank_you_page';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_kanzi' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|numeric', //|size:11
        ],
        [
            'name_kanzi.required'  => '名前を入力してください。',
            'name_kanzi.string'  => '名前に特殊記号が含まれていました。正確に入力してください。',
            'name_kanzi.max'  => '文字の数が255個を克服できません。',
            'name_kana.required'  => '名前を入力してください。',
            'name_kana.string'  => '名前に特殊記号が含まれていました。正確に入力してください。',
            'name_kana.max'  => '文字の数が255個を克服できません。',
            'email.required'    => 'メールアドレスを入力してください。',
            'email.unique'    => 'このメールアドレスは既に存在します。',
            'email.email'    => 'メールを正確に入力してください。',
            'email.max'    => '文字の数が255個を克服できません。',
            'password.required'    => 'パスワードを入力してください。',
            'password.min'    => 'パスワードは6文字以上である必要があります。',
            'password.confirmed'    => 'パスワード確認入力が正しくありません。',
            'phone_number.required'    => '電話番号を入力してください。',
            // 'phone_number.size'    => '電話番号文字数は11文字である必要があります。',
            'phone_number.numeric'    => '電話番号を数字で入力してください。',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name_kanzi' => $data['name_kanzi'],
            'name_kana' => $data['name_kana'],
            'birthday' => $data['birth_year'].'-'.$data['birth_month'].'-'.$data['birth_day'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => bcrypt($data['password']),
            'role' => 1,
        ]);
    }
}
