<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
class GithubController extends Controller
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
    protected $redirectTo = '/home';

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
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('github')->user();


        //check if user exists and log user in

        $user = User::where('email', $userSocial->email)->first();
        if($user){
            if(Auth::loginUsingId($user->id)){
               return redirect()->route('home');
            }
        }

     //else sign the user up
     $userSignup = User::create([
            'name_kanzi' => $userSocial->name,
            'email' => $userSocial->email,
            'password' => bcrypt('12345678'),
            'github_profile'=> $userSocial->user['link']
        ]);

      
        //finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)){
                return redirect()->route('home');
            }
        }

    }


}
