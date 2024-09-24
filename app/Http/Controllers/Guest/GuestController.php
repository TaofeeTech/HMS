<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Bookings;

class GuestController extends Controller
{

    public function Profile()
    {

        $guest_id = Auth::user()->id;

        $guest = User::findOrFail($guest_id);

        $guest_current_room = Bookings::with('room.category')
            ->where('guest_id', $guest_id)
            ->where('status', 'confirmed')
            ->where('payment_status', 'paid')
            ->get();

        return view('profile.guest_profile', compact('guest', 'guest_current_room'));

    }#End Method

}
