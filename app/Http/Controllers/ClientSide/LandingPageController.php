<?php

namespace App\Http\Controllers\ClientSide;

use App\Menu;
use App\Tacos;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tacosItems = Tacos::all()->random(8);
        $menus = Menu::all()->random(6);

        return view('client-side.landing-page', [
            'tacosItems' => $tacosItems,
            'menus' => $menus
        ]);
    }
}
