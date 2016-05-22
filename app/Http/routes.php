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
use Illuminate\Support\Facades\Input;

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/{etc}', function () {
        return view('home');
    })
    ->name('home')
    ->where('etc', '(home|login)?');
    

    Route::get('/gallery', function () {
        $rooms = App\Room::where('status', 'completed')->get();
        return view('gallery', ['rooms' => $rooms]);
    })
    ->name('gallery');

    Route::get('/rooms', function () {
        $rooms = App\Room::where('status', 'ongoing')->get();
        return view('rooms', ['rooms' => $rooms]);
    });

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::post('/room', 'RoomController@store');

    Route::get('/faq', function () {
        return view('faq');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/canvas', function () {
            return view('canvas.canvas');
        });

        Route::get('/room/{id}', 'RoomController@view')
        ->name('room')
        ->where('id', '[0-9]+');
    });

    Route::get('room/{id}/load', function ($id) {
        if(Request::ajax()) {
            return App\Room::findOrFail($id)->json;
        }
    });

    Route::put('room/{id}/store', function ($id) {
        if(Request::ajax()) {
            App\Room::findOrFail($id)->update(['json' => Input::get('json')]);
        }
    });

    Route::post('test', function (Request $request) {
        return 0;
    });

    Route::get('room/test', function (Request $request) {
        return 0;
    });



    Route::put('room/{id}/updateImage', function ($id) {
        if(Request::ajax()) {
            $img = Input::get('image');
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $room = App\Room::findOrFail($id);
            file_put_contents($room->image_path, $data);
            return $room->image_path;
        }
    });

    Route::put('room/{id}/saveImage', function ($id) {
        if(Request::ajax()) {
            App\Room::findOrFail($id)->update(['status' => 'completed']);
        }
    });

    Route::get('room/{id}/status', function ($id) {
        return App\Room::findOrFail($id)->status;
    });
});
