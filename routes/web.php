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

Route::get('/', function () {
    return view('welcome');
});
//ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
//user
Route::group(['middleware' => ['auth']], function () {
Route::resource('users', 'UsersController');
Route::resource('shops', 'ShopsController');
Route::get('mypage_shop','ShopsController@mypage_shop')->name('mypage.shop');
Route::get('shops/{id}/photo_app','ShopsController@photo_app')->name('shops.photo_app');
Route::get('shops/{id}/phpto_delete','ShopsController@photo_delete')->name('shops.photo_delete');

//chat
Route::get('chat/{id}/show', 'ChatController@show')->name('chat.show');
Route::post('chat/{id}/store', 'ChatController@store')->name('chat.store');
Route::get('chat/createChatRoom', 'ChatController@createChatRoom')->name('chat.createChatRoom');
Route::get('chat/index', 'ChatController@index')->name('chat.index');
 
});