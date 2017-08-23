<?php

/*
|--------------------------------------------------------------------------
| Webルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのWebルートを登録できます。"web"ルートは
| ミドルウェアのグループの中へ、RouteServiceProviderによりロード
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@tweet')->name('home');

Route::get('account', 'AccountController@account');
Route::get('profile', 'AccountController@profile')->name('profile');
Route::put('profile', 'AccountController@updateProfile')->name('profile');

Route::get('search', 'SampleController@search');
Route::get('user', 'SampleController@user');

Route::get('{url_name}/following', 'FriendshipController@following');
Route::get('{url_name}/followers', 'FriendshipController@followers');
Route::get('{url_name}/profile', 'FriendshipController@profile');