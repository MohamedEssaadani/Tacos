<?php

namespace App\Http\Controllers\ClientSide;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Order;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client-side.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'billing_name' => 'required|string',
            'billing_address' => 'required|string',
            //size 13 for moroccan number ex: +212699994433
            'billing_phone' => 'required|string|size:13'
        ]);

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        }

        $cart = session()->get('cart');

        $data['billing_subtotal'] = 0;
        foreach ($cart as $item) {
            $data['billing_subtotal'] += $item['tacos']->tacos_price * $item['quantity'];
        }
        //0.5% for example
        $data['billing_tax'] = 1.05;
        $data['billing_total'] =  $data['billing_subtotal'] * $data['billing_tax'];
        $data['shipped'] = false;

        Order::create($data);

        return redirect()->to(route('LandingPage'))->with('success', 'Your order have been created, you will get your products between 15minutes and 30minutes :)!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
