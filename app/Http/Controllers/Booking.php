<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Orders;
// use Auth;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Log;

class Booking extends Controller
{

    // public function removeFromCart($id)
    // {
    //     // Get the cart from session
    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$id])) {

    //         $bookings = Bookings::where('id', $cart[$id])
    //             ->delete();

    //         unset($cart[$id]);

    //         session()->put('cart', $cart);

    //         return redirect()->back();

    //     }

    // }#End Method

    public function Home()
    {

        $user = Auth::user();

        $userBookings = Bookings::with('room.category')
            ->where('guest_id', $user->id)
            ->whereNot('status', 'pending')
            ->get();

        return view('dashboard', compact('userBookings'));

    }#End Method

    public function StoreBookings(Request $request)
    {

        $validatedData = $request->validate([
            'room_type' => 'required|string',
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'num_guests' => 'required|integer|min:1',
        ]);

        $arrival_date_string = $validatedData['arrival_date'];
        $departure_date_string = $validatedData['departure_date'];

        $arrival_date = Carbon::createFromFormat('d/m/Y', $arrival_date_string);
        $departure_date = Carbon::createFromFormat('d/m/Y', $departure_date_string);

        $rooms = Room::where('room_type', $validatedData['room_type'])
            ->where('status', 'available')
            ->latest()
            ->get();


        $availableRooms = $rooms->filter(function ($room) use ($validatedData) {

            return $room->capacity >= $validatedData['num_guests'];

        });

        $bookedRooms = Bookings::BookedRooms($arrival_date, $departure_date);

        $availableRooms = $availableRooms->filter(function ($room) use ($bookedRooms) {

            return !in_array($room->id, $bookedRooms->toArray());

        });

        if ($availableRooms->isEmpty()) {

            // Suggest alternative rooms
            $alternativeRooms = Room::where('capacity', '>=', $validatedData['num_guests'])
                ->where('status', 'available')
                ->whereNotIn('id', $bookedRooms)
                ->get();

            $alternativeRoomIds = $alternativeRooms->pluck('id')->toArray();

            return redirect()->route('alternative.rooms', ['roomIds' => implode(',', $alternativeRoomIds)]);

        } else {

            // Avaliable Room
            $room = $availableRooms->first();

            // Calculate the number of nights stayed and total price
            $number_of_night = abs($departure_date->diffInDays($arrival_date));
            $number_of_night = (int) $number_of_night;
            $total_cost = $number_of_night * $room->price_per_night;

            // create new booking record
            $booking = new Bookings();
            $booking->room_id = $room->id;
            $booking->guest_id = $request->id;
            $booking->arrival_date = $arrival_date;
            $booking->departure_date = $departure_date;
            $booking->num_guests = $validatedData['num_guests'];
            $booking->room_type = $validatedData['room_type'];
            $booking->total_cost = $total_cost;
            $booking->rate = $room->price_per_night;
            $booking->save();

            $bookingId = $booking->id;

            // $recentbooking = $booking::findOrFail($bookingId);

            // $cart = session()->get('cart', []);
            // if (!isset($cart[$bookingId])) {

            //     $cart[$bookingId] = [
            //         'room_id' => $booking->room_id,
            //         'price' => $booking->total_cost,
            //         'room_type' => $booking->room_type
            //     ];

            //     session()->put('cart', $cart);

            // }

            $userBookings = Bookings::with('room.category')
                ->where('guest_id', $request->id)
                ->latest()
                ->get();

            return redirect()->route('home', compact('userBookings'))->with('mssg', 'Your Room Has Been Added To Cart, Kindly Complete Your Booking By Making Payment');

        }

    }#End Method

    public function AlternativeRooms($roomIds)
    {

        $roomIdArray = explode(',', $roomIds);

        $alternativeRooms = Room::whereIn('id', $roomIdArray)
            ->pluck('id');



        return view('profile.alternative_rooms', compact('alternativeRooms'))
            ->with('info', 'Sorry, we could not find a room that matches your choice! We have provided alternative rooms that might suit your taste.');

    }#End Method

    public function BookAlternativeRoom(Request $request)
    {

        $validatedData = $request->validate([

            'room_type' => 'required',
            'daterange' => 'required',
            'num_guests' => 'required'

        ]);

        $daterange = $validatedData['daterange'];
        $daterange = explode('/', $daterange);

        $arrival_date_string = $daterange[0];
        $departure_date_string = $daterange[1];

        $arrival_date = Carbon::createFromFormat('Y-m-d', trim($arrival_date_string));
        $departure_date = Carbon::createFromFormat('Y-m-d', trim($departure_date_string));

        $roomChoose = Room::findorFail($request->room_id);

        $bookedRooms = Bookings::BookedRooms($arrival_date, $departure_date);

        if ($roomChoose->capacity >= $validatedData['num_guests'] && !in_array($request->room_id, $bookedRooms->toArray())) {

            // Calculate the number of nights stayed and total price
            $number_of_night = abs($departure_date->diffInDays($arrival_date));
            $number_of_night = (int) $number_of_night;
            $total_cost = $number_of_night * $roomChoose->price_per_night;

            // create new booking record
            $booking = new Bookings();
            $booking->room_id = $roomChoose->id;
            $booking->guest_id = $request->id;
            $booking->arrival_date = $arrival_date;
            $booking->departure_date = $departure_date;
            $booking->num_guests = $validatedData['num_guests'];
            $booking->room_type = $validatedData['room_type'];
            $booking->total_cost = $total_cost;
            $booking->rate = $roomChoose->price_per_night;
            $booking->save();

            // dd('Room booked Successfully');

            $userBookings = Bookings::with('room.category')
                ->where('guest_id', $request->id)
                ->latest()
                ->get();

            return redirect()->route('home', compact('userBookings'))->with('mssg', 'A Room Have Been Booked For You, Kindly Complete Your Booking By Making Payment');

        }



    }#End Method


    public function MakePaymentPaystack(Request $request)
    {

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $request->email,
            'amount' => $request->price * 100, // Paystack uses kobo, so multiply the price by 100
            'callback_url' => route('paystack.callback'), // Ensure you have the correct callback URL here
            'metadata' => [
                "cancel_action" => route('paystack.cancel'),
                'user_id' => $request->user_id,
                'room_id' => $request->room_id,
                'room_name' => $request->room_name,
                'booking_id' => $request->booking_id
            ]
        ];

        $fields_string = http_build_query($fields);

        // Open connection
        $ch = curl_init();

        // Set the URL, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_b5737d406584d9aab4bdde2c10a07e692972ffe7", // Add your secret key here
            "Cache-Control: no-cache",
        ));

        // So that curl_exec returns the contents of the cURL instead of echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute post
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return response()->json(['error' => curl_error($ch)], 500);
        }

        // Decode the result
        $result = json_decode($result, true); // Decode as associative array

        // Check for errors in the Paystack response
        if (isset($result['status']) && $result['status']) {
            return response()->json([
                'status' => true,
                'authorization_url' => $result['data']['authorization_url'],
                'access_code' => $result['data']['access_code'],
                'reference' => $result['data']['reference']
            ]);
        } else {
            return response()->json(['error' => 'Transaction initialization failed'], 400);
        }

    }#End Method

    public function callback(Request $request)
    {
        $reference = $request->query('reference'); // Get the reference from the callback query string

        // Paystack API to verify the transaction
        $url = "https://api.paystack.co/transaction/verify/" . rawurlencode($reference);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer sk_test_b5737d406584d9aab4bdde2c10a07e692972ffe7" // Use your Paystack secret key
        ]);

        $result = curl_exec($ch); // Execute cURL request
        curl_close($ch); // Close the cURL session

        $result = json_decode($result, true); // Decode the JSON response

        if (isset($result['status']) && $result['status'] == true) {
            // Payment was successful
            $paymentDetails = $result['data'];

            // Check if necessary metadata exists before proceeding
            if (isset($paymentDetails['metadata'])) {
                $order = new Orders;
                $bookings = new Bookings;
                $rooms = new Room;

                // Fill in order details
                $order->transaction_id = $paymentDetails['id'];
                $order->room_id = $paymentDetails['metadata']['room_id'];
                $order->user_id = $paymentDetails['metadata']['user_id'];
                $order->status = 'success';
                $order->reference = $paymentDetails['reference'];
                $order->amount = $paymentDetails['amount']; 
                $order->paid_at = $paymentDetails['paid_at'];
                $order->channel = $paymentDetails['channel'];
                $order->currency = $paymentDetails['currency'];
                $order->save(); // Save the order

                // Find and update booking status
                $booking_ids = explode(',', $paymentDetails['metadata']['booking_id']);
                foreach ($booking_ids as $b_id) {
                    $booking = $bookings::findOrFail($b_id);
                    $booking->status = 'confirmed';
                    $booking->payment_method = 'Paystack';
                    $booking->payment_status = 'paid';
                    $booking->update();
                }

                // Find and update room status
                $room_ids = explode(',', $paymentDetails['metadata']['room_id']);
                foreach ($room_ids as $r_id) {
                    $room = $rooms::findOrFail($r_id);
                    $room->status = 'not available';
                    $room->update();
                }

                $user = Auth::user();
                $userBookings = Bookings::with('room.category')
                    ->where('guest_id', $user->id)
                    ->get();

                // Redirect or return a view
                return view('dashboard', compact('userBookings'))->with('success', 'Payment successful and booking confirmed!');
            } else {
                return view('dashboard')->with('mssg', 'Payment metadata is missing.');
            }
        } else {
            // Payment failed or was not successful
            return redirect()->route('dashboard')->with('error', 'Payment verification failed.');
        }
    }

    public function cancel()
    {

        $user = Auth::user();
        $userBookings = Bookings::with('room.category')
            ->where('guest_id', $user->id)
            ->get();

        $notification = [
            'type' => 'error',
            'message' => 'An Error Occured, and We are unable to complete and verify your payment'
        ];

        return redirect()->route('home', compact('userBookings'))->with($notification);

    }

    public function removeFromCart($id)
    {

        $cart_id = $id;

        if (isset($cart_id)) {

            $bookings = new Bookings;

            $bookings::findorFail($cart_id)
                ->delete();

            return redirect()->back();

        }

    }#End Method

}
