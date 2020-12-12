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
Route::get('users/{id}/delete_profile_photo', 'UsersController@delete_profile_photo')->name('users.delete_profile_photo');
//shop
Route::resource('shops', 'ShopsController');
Route::get('mypage_shop','ShopsController@mypage_shop')->name('mypage.shop');
Route::get('shops/{id}/photo_app','ShopsController@photo_app')->name('shops.photo_app');
Route::get('shops/{id}/phpto_delete','ShopsController@photo_delete')->name('shops.photo_delete');

//chat
Route::get('chat/{id}/show', 'ChatController@show')->name('chat.show');
Route::post('chat/{id}/store', 'ChatController@store')->name('chat.store');
Route::get('chat/createChatRoom', 'ChatController@createChatRoom')->name('chat.createChatRoom');
Route::get('chat/index', 'ChatController@index')->name('chat.index');
Route::get('chat/{id}/message_redirect', 'ChatController@message_redirect')->name('chat.message_redirect');
//gallery
Route::get('gallery/create', 'GallerysController@create')->name('gallery.create');
Route::post('gallery/store', 'GallerysController@store')->name('gallery.store');
Route::get('gallery/{id}/showGallerys', 'GallerysController@showGallerys')->name('gallery.showGallerys');
Route::get('gallery/{id}/destroy', 'GallerysController@destroy')->name('gallery.destroy');
});