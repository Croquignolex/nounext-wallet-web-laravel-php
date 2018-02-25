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

Auth::routes();

//--Login routes
Route::post('{language}/logout', 'Auth\LoginController@logout')
    ->name('logout');
Route::post('{language}/login', 'Auth\LoginController@login');
Route::get('{language}/login', 'Auth\LoginController@showLoginForm')
    ->name('login');

//--Registration routes
Route::post('{language}/register', 'Auth\RegisterController@register');
Route::get('{language}/register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');
Route::get('{language}/confirmed/{token}/{email}', 'Auth\ConfirmedController')
    ->name('confirmed');

//--Password reset routes
Route::post('{language}/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');
Route::get('{language}/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');
Route::post('{language}/password/reset/{token}', 'Auth\ResetPasswordController@reset');
Route::get('{language}/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');

//--Home route
Route::get('{language?}', 'HomeController')->name('home');

Route::group(['middleware' => 'user'], function(){
	//--Dashboard routeuser
	Route::get('{language?}/dashboard', 'App\DashboardController')
	    ->name('dashboard');

	//--Search route
	Route::post('{language?}/search', 'App\SearchController')
	    ->name('search');

	//--Account route
	Route::resource('{language?}/accounts', 'App\AccountController');

	//--Transaction route
	Route::resource('{language?}/transactions', 'App\TransactionController');

	//--Configuration route
	Route::get('{language?}/configurations', 'App\ConfigurationsController@index')->name('configuration');
	Route::post('{language?}/configurations', 'App\ConfigurationsController@update');

    //--Notification route
    Route::get('{language?}/notifications', 'App\NotificationsController@index')->name('notification.index');
    Route::get('{language?}/notifications/remove', 'App\NotificationsController@destroy')->name('notification.destroy');
});