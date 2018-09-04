<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as AppController;
use Illuminate\Http\Request;

class Controller extends AppController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
}
