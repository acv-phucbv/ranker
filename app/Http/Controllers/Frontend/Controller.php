<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller as AppController;

class Controller extends AppController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        //
    }

    public function index() {
        return view('frontend.index');
    }
}