<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Tacos;
use Illuminate\Http\Request;

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
