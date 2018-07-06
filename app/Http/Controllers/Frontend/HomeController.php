<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller as FrontendController;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
