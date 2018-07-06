<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as AppController;

class Controller extends AppController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.index');
    }
}
