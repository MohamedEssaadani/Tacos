<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.browse', [
            'page_title' => 'Orders'
        ]);
    }

    public function getAll()
    {
        $orders = Order::all();
        return response($orders);
    }
}
