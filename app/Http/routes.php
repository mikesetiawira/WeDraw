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

// Route::get('/', function () {
//     return view('welcome');
// });

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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/{etc}', function () {
        return view('home');
    })
    ->name('home')
    ->where('etc', '(home|login)?');

    Route::get('/gallery', function () {
        return view('gallery');
    })
    ->name('gallery');

    Route::get('/rooms', function () {
        return view('rooms');
    });

    Route::get('/room/{id}', 'RoomController@view')
    ->name('room')
    ->where('id', '[0-9]+');

    Route::post('/room', 'RoomController@store');

    Route::get('/faq', function () {
        return view('faq');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/canvas', function () {
            return view('canvas.canvas');
        });
    });



});
