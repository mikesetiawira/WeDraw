<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $room = $request->user()->rooms()->create([
            'title' => '',
            'canvas' => '[]'
        ]);

        return redirect()->route('room', [$room]);
    }

    public function view($id)
    {
        $room = Room::findOrFail($id);
        return view('canvas.canvas', ['room' => $room]);
        //return view('canvas.canvas');
    }
}
