<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rooms;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{

    public function RemoveItemFromCart($id)
    {

        Cart::remove($id);
        return back();

    }//end method

    public function index()
    {
        $cartItems = Cart::getContent();

        $totalPrice = $cartItems->sum(function ($item) {

            return $item->price * $item->quantity; 
            
        });

        return view('cart', compact('cartItems', 'totalPrice'));
    }//end method

    public function AddToCart($id)
    {

        $room = Rooms::findOrFail($id);
        $options = Session::get('options', []);
        $num_of_nights = $options['days_difference'] ?? 1;
        $image = json_decode($room->image);
        $f_image = collect($image)->first();

        Cart::add([

            // 'id' => $this->generateUniqueId(),
            // 'room_type' => $room->type,
            // 'room_number' => $room->room_number,
            // 'price' => $room->price,
            // 'room_category' => $room['category']['title'],
            // 'num_of_night' => $num_of_nights,

            'id' => $this->generateUniqueId(),  
            'name' => $room->id, 
            'price' => $room->price,
            'quantity' => 1, 
            'attributes' => [
                'room_number' => $room->room_number,  
                'room_category' => $room->category->title, 
                'num_of_night' => $num_of_nights,  
                'room_type' => $room->type,
                'image' => $f_image
            ]
        ]);

        return redirect()->route('cart');

    }//end method

    public function generateUniqueId()
    {

        $uniqueId = Str::random(6);

        return $uniqueId; // Example: 'A3F9Z1'
    }//end method

}
