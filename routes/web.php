<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;



Route::get('/','IntroCtrl@index');
Auth::routes();
Route::get('/register_page', function (){
    return view('auth.register_page');
});
Route::get('register_thank_you_page', function (){
    return view('auth.register_thank_you_page');
});

Route::get('/search', 'SearchCtrl@searchview');


Route::get('/adminlogin', function () {
    return view('hairdresser.login');
});

Route::get('/admin', function () {
    return view('hairdresser.dashboard');
});
Route::get('/superadmin', 'IntroCtrl@introedit');
Route::post('/deletegallery', 'IntroCtrl@deletegallery');
Route::post('/savegallery', 'IntroCtrl@savegallery');
Route::post('/saveintro', 'IntroCtrl@saveintro');
Route::get('/adminhome', 'StylistCtrl@home');
Route::get('/menu', 'StylistCtrl@menu');
Route::get('/member', 'StylistCtrl@member');
Route::get('/reserve/{id}', 'StylistCtrl@reserve');
Route::post('/setcompleted', 'ReservationCtrl@complete');

Route::post('/logincheck', 'UsersCtrl@check');
Route::get('/adminregister', 'UsersCtrl@registerview');
Route::post('/getsubarea', 'UsersCtrl@getsubarea');
Route::post('/getarea', 'UsersCtrl@getarea');

Route::get('/menu_groups/edit', 'MenuCtrl@menu_groups_edit');
Route::post('/menu_groups/save', 'MenuCtrl@menu_groups_save');

Route::get('/menu/edit/{menugroupname}', 'MenuCtrl@menu_edit');
Route::post('/menu/save/{menugroupname}', 'MenuCtrl@menu_save');

Route::post('/registercheck', 'UsersCtrl@register');

Route::post('/saveshopdata','StylistCtrl@saveshopdata');

Route::get('/mypage', 'StylistCtrl@mypage');

Route::get('/account','UsersCtrl@account');
Route::get('/edit_account','UsersCtrl@edit_account');
Route::get('/stylistlogout', function(Request $req){
    $req->session()->flush();
    return redirect('/');
});

Route::get('/resetpassword', function (){
    return view('hairdresser.passwordreset');
});
Route::post('/changepassword', 'UsersCtrl@resetpassword');
Route::post('/save_account', 'UsersCtrl@save_account');

Route::post('/uploadphoto', 'StylistCtrl@uploadphoto');

//12-18
Route::post('/get_sub_area_list', 'SearchCtrl@getSubAreaList');
Route::post('/search_result', 'SearchCtrl@getSearchResult'); 
Route::get('/hair_style_detail/{image_id}', 'SearchCtrl@getHairStyleDetail');
Route::get('/reservation', 'SearchCtrl@reservation');
Route::post('/reservation_step_one', 'SearchCtrl@reservationStepOne');
Route::post('/reservation_step_two', 'SearchCtrl@reservationStepTwo');
Route::post('/complete_reservation', 'SearchCtrl@completeReservation');
Route::get('/reservation_step_complete', 'SearchCtrl@reservationStepTwoGet');
Route::post('/favorite_active', 'SearchCtrl@favoriteActive');
Route::post('/favorite_remove', 'SearchCtrl@favoriteRemove');
Route::get('/my_favorite_page', 'SearchCtrl@MyFavoritePage');
Route::get('/about_us_page', function (){
    return view('about_us_page');
});


//facebook
Route::get('login/facebook', 'Auth\FacebookController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\FacebookController@handleProviderCallback');

//twitter
Route::get('login/twitter', 'Auth\TwitterController@redirectToProvider');
Route::get('login/twitter/callback', 'Auth\TwitterController@handleProviderCallback');
//github
Route::get('login/github', 'Auth\GithubController@redirectToProvider');
Route::get('login/github/callback', 'Auth\GithubController@handleProviderCallback');
//linkedin
Route::get('login/linkedin', 'Auth\LinkedinController@redirectToProvider');
Route::get('login/linkedin/callback', 'Auth\LinkedinController@handleProviderCallback');

//google
Route::get('login/google', 'Auth\GoogleController@redirectToProvider');
Route::get('login/google/callback', 'Auth\GoogleController@handleProviderCallback');