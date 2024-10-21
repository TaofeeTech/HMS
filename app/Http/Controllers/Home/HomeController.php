<?php

namespace App\Http\Controllers\Home;

use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function RoomDetails($id)
    {

        $room_id = $id;
        $room = Rooms::findOrFail($room_id);

        return view('room_details', compact('room'));

    }//End Method

}
