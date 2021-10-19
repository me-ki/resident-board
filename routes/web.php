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

Route::get('/', 'InformationsController@index');

Route::view('login', 'auth.login')->name('login');

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    // ユーザ登録
    Route::get('admin', 'GateController@admin');
    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
    
    //スタッフ用操作機能
    Route::resource('buildings', 'BuildingsController');
    Route::resource('residences', 'ResidencesController');
    Route::resource('users', 'UsersController');
        
});

Route::group(['middleware' => ['auth', 'can:user']], function () {
    Route::redirect('/user', '/login', 301);
    Route::get('user/{user}', 'GateController@user');
});

Auth::routes(['register' => false]);

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');



Route::group(['middleware' => ['auth']], function(){
        Route::resource('informations', 'InformationsController');
});
