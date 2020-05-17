<?php

namespace App\Http\Controllers;

use App\Tacos;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('client-side.cart');
    }

    public function store($id)
    {
        $tacos = Tacos::find($id);

        if ($tacos == null) {
            abort(404);
        }

        $cart = session()->get('cart');

        //if customer didn't add an item before we will create new cart session
        if ($cart == null) {
            $cart = array(
                $id => [
                    'tacos' => $tacos,
                    'quantity' => 1
                ]
            );

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Tacos added to cart successfully. <a href="#">View Cart</a>');
        }

        //if the customer already added an item so lets check if this item already there to increase qty
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Tacos added to cart successfully. <a href="#">View Cart</a>');
        }

        // if tacos not exist in cart then add to cart
        $cart[$id] = [
            'tacos' => $tacos,
            'quantity' => 1
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Tacos added to cart successfully. <a href="#">View Cart</a>');
    }
}
