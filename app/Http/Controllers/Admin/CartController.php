<?php

namespace App\Http\Controllers\Admin;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('cart', compact('cartItems'));
    }
    
}
