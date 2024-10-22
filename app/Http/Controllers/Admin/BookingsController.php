<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rooms;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BookingsController extends Controller
{

    public function SearchResult()
    {

        return view('room-search');

    }

    public function Search(Request $request)
    {

        // dd($request->all());

        $validatedData = $request->validate([
            "daterange" => 'required',
            "type" => 'required',
            "num_guest" => ['required', 'numeric']
        ]);

        $daterange = $validatedData['daterange'];
        $daterange = explode('/', $daterange);

        $arrival_date_string = $daterange[0];
        $departure_date_string = $daterange[1];

        $arrival_date = Carbon::createFromFormat('Y-m-d', trim($arrival_date_string));
        $departure_date = Carbon::createFromFormat('Y-m-d', trim($departure_date_string));
        $daysDifference = $arrival_date->diffInDays($departure_date);

        try {

            $roomData = [
                "type" => $validatedData['type'],
                "num_guest" => $validatedData['num_guest']
            ];

            // dd($roomData);

            $bookedRooms = Bookings::BookedRooms($arrival_date, $departure_date);

            $availableRooms = Rooms::SearchRoom($roomData);

            $availableRooms = $availableRooms->filter(function ($room) use ($bookedRooms) {

                return !in_array($room->id, $bookedRooms->toArray());

            });

            // dd($availableRooms);
            $validatedData['days_difference'] = $daysDifference;

            if (Session::has('options')) {
                
                $currentOptions = Session::get('options');

                $updatedOptions = array_merge($currentOptions, $validatedData);
                
                Session::put('options', $updatedOptions);

            } else {
                
                Session::put('options', $validatedData);

            }

            return view('room-search', compact('availableRooms', 'validatedData'));

        } catch (\Exception $e) {

            throw $e;

        }

    }//End Method

}
