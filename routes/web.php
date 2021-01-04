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

Route::get('/','ShopsController@welcom');
//help_chat
Route::post('chat/store_help', 'ChatController@store_help');
Route::get('chat/help_view', 'ChatController@help_view')->name('chat.help_view');
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
Route::post('shops/narrow_down', 'ShopsController@narrow_down')->name('shops.narrow_down');
Route::get('mypage_shop','ShopsController@mypage_shop')->name('mypage.shop');
Route::get('shops/{id}/photo_app','ShopsController@photo_app')->name('shops.photo_app');
Route::get('shops/{id}/phpto_delete','ShopsController@photo_delete')->name('shops.photo_delete');
Route::post('shops/serch_tag_index', 'ShopsController@serch_tag_index')->name('shops.serch_tag_index');
//chat
Route::get('chat/{id}/show', 'ChatController@show')->name('chat.show');
Route::get('chat/{id}/view', 'ChatController@view')->name('chat.view');
Route::post('chat/{id}/store', 'ChatController@store')->name('chat.store');
Route::get('chat/{id}/create_chatroom', 'ChatController@create_chatroom')->name('chat.create_chatroom');
Route::get('chat/user_index', 'ChatController@user_index')->name('chat.user_index');
Route::get('chat/{id}/shop_index', 'ChatController@shop_index')->name('chat.shop_index');
Route::get('chat/{id}/message_redirect', 'ChatController@message_redirect')->name('chat.message_redirect');
//gallery
Route::get('gallery/{id}/create', 'GallerysController@create')->name('gallery.create');
Route::post('gallery/{id}/store', 'GallerysController@store')->name('gallery.store');
Route::get('gallery/{id}/showGallerys', 'GallerysController@showGallerys')->name('gallery.showGallerys');
Route::get('gallery/{id}/destroy', 'GallerysController@destroy')->name('gallery.destroy');
//favoite
Route::post('favorites/{id}/favoite', 'FavoritesController@store')->name('favorites.favorite');
Route::delete('favorites/{id}/unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
Route::get('favorites/index', 'FavoritesController@index')->name('favorites.index');
Route::get('favorites/{id}/check', 'FavoritesController@like_check');
//募集
Route::get('recruit/create', 'RecruitController@create')->name('recruit.create');
Route::post('recruit/store', 'RecruitController@store')->name('recruit.store');
Route::get('recruit/index', 'RecruitController@index')->name('recruit.index');
Route::get('recruit/user_show', 'RecruitController@user_show')->name('recruit.user_show');
Route::get('recruit/{id}/show', 'RecruitController@show')->name('recruit.show');
//募集マッチング
Route::post('recruit/{id}/match', 'RecruitController@recruit_match')->name('recruit.match');
Route::delete('recruit/{id}/match_delete', 'RecruitController@match_delete')->name('recruit.match_delete');
Route::get('recruit/{id}/match_index', 'RecruitController@match_index')->name('recruit.match_index');
Route::get('recruit/{id}/match_check', 'RecruitController@match_check');
});





