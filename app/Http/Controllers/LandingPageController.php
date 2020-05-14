<?php

namespace App\Http\Controllers;

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
        $tacosItems = Tacos::inRandomOrder(8)->get();

        return view('client-side.landing-page', [
            'tacosItems' => $tacosItems
        ]);
    }
}
