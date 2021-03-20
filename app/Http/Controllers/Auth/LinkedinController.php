<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
class LinkedinController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('linkedin')->user();


        //check if user exists and log user in

        $user = User::where('email', $userSocial->email)->first();
        if($user){
            if(Auth::loginUsingId($user->id)){
               return redirect()->route('/');
            }
        }

     //else sign the user up
     $userSignup = User::create([
            'name_kanzi' => $userSocial->name,
            'email' => $userSocial->email,
            'password' => bcrypt('12345678'),
            'linkedin_profile'=> $userSocial->user['link'],
            'gender'=> $userSocial->user['gender']
        ]);

      
        //finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)){
                return redirect()->route('/');
            }
        }

    }


}
