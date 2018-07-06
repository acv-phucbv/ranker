<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\Controller as FrontendController;

class PostsController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('edit')->except('index', 'show');
    }

    public function index() {
        return view('frontend.posts.index');
    }
}
