<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('main');

    Route::get('/admin', [
        'uses' => 'AppController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('/admin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
});


Route::get('/', function () {
    return view('welcome');
});
//Admin

//Route::get('register', 'Auth\AuthController@showRegistrationForm');
//Route::post('register', 'Auth\AuthController@register');
Route::get('/', 'HomeController@index');
Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'LoginController@postLogin');
$this->get('logout', 'Auth\AuthController@logout');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'RegistrationController@postRegister');
Route::get('register/verify/{confirmationCode}', 'RegistrationController@confirm');


Route::get('/home', 'HomeController@index');
