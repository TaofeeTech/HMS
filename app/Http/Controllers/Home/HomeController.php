<?php

namespace App\Http\Controllers\Home;

use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{

    public function RoomDetails($id)
    {

        $room_id = $id;
        $room = Rooms::findOrFail($room_id);
        $similarRooms = Rooms::where('type', $room->type)
            ->whereNot('id', $room_id)
            ->get();
        $options = Session::get('options');

        return view('room_details', compact('room', 'similarRooms', 'options'));

    }//End Method

}
