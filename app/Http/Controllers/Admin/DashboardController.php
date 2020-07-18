<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
