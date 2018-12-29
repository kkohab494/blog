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
//======================================Home Route=================================//
//
Route::get('/', 'HomeController@index')->name('home');
Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');


Auth::routes();

//======================================Admin Routes=================================//

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function(){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	
	Route::get('settings', 'SettingsController@index')->name('settings');
	Route::put('profile-update', 'SettingsController@profileUpdate')->name('profile.update');
	Route::put('password-update', 'SettingsController@passwordUpdate')->name('password.update');

	Route::resource('tag', 'TagsController');
	Route::resource('category', 'CategoryController');
	Route::resource('post', 'PostController');

	Route::get('/pending/post','PostController@pending')->name('post.pending');
	Route::get('post/{id}/approve', 'PostController@approve')->name('post.approve');

	Route::get('/subscriber', 'SubscriberController@index')->name('subscriber.index');
	Route::delete('/subscriber/{id}', 'SubscriberController@destroy')->name('subscriber.destroy');

});
//======================================Author Routes=================================//
//
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function(){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('settings', 'SettingsController@index')->name('settings');
	Route::put('profile-update', 'SettingsController@profileUpdate')->name('profile.update');
	Route::put('password-update', 'SettingsController@passwordUpdate')->name('password.update');
	
	Route::resource('post', 'PostController');

});





