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

// Login Routes...
Route::get('travel-admin', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('travel-admin', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
Route::get('travel-register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('travel-register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

Route::group(['namespace' => 'Front'], function() {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index',
    ]);
    Route::get('/travel/{slugTitle}', [
        'as' => 'dest-show',
        'uses' => 'HomeController@show',
    ]);
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::get('/home', 'HomeController@index');
    Route::resource('destinations', 'DestinationController');
    Route::resource('agendas', 'AgendaController');
    Route::resource('participants', 'ParticipantController');
});
