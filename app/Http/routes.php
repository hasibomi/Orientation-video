<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@home');
    Route::get('video/{slug}/view', 'HomeController@video');
    Route::get('video/{slug}/watch', 'HomeController@watchVideo');
    Route::get('video/{slug}/unwatch', 'HomeController@unwatchVideo');
    Route::get('login', 'HomeController@loginPage');
    Route::get('logout', 'HomeController@logout');
    Route::post('signin', 'HomeController@signin');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    |
    | This route group applies the "admin" middleware group to every route
    | it contains. The "admin" middleware group is defined in the HTTP
    | kernel and protects from unauthorized admin dashboard access.
    |
    */
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'DashboardController@home');
        Route::get('dashboard/users', 'DashboardController@users');
        Route::get('dashboard/user/{username}/view', 'DashboardController@viewUser');


        Route::get('dashboard/videos', 'DashboardController@videos');
        Route::get('dashboard/video/add', 'VideoController@form');
        Route::get('dashboard/video/{slug}/view', 'VideoController@view');
        Route::post('dashboard/video/store', 'VideoController@store');
    });
});
