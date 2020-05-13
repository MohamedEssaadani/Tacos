<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Dashboard";

        return view('admin.dashboard', [
            'page_title' => $page_title
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }
}
