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

/**
 * 認証画面
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * 新規登録画面
 */
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

/**
 * ホーム画面
 */
Route::get('home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@tweet')->name('home');

/**
 * 登録情報編集画面
 */
Route::get('account', 'AccountController@account')->name('account');
Route::put('account','AccountController@updateAccount')->name('account');
Route::get('profile', 'AccountController@profile')->name('profile');
Route::put('profile', 'AccountController@updateProfile')->name('profile');

/**
 * 検索結果画面
 */
Route::post('search', 'SearchController@search');

/**
 * フォロワー・フォロウィー一覧表示画面
 */
Route::get('{url_name}/following', 'FriendshipController@following');
Route::get('{url_name}/followers', 'FriendshipController@followers');

/**
 * プロフィール表示画面
 */
Route::get('{url_name}/profile', 'FriendshipController@profile');

/**
 * フォロー・フォロー解除機能
 */
Route::post('{url_name}/follow', 'FriendshipController@followUser');
Route::delete('{url_name}/unFollow', 'FriendshipController@unFollowUser');