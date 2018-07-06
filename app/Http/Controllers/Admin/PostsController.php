<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller as AdminController;

class PostsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        return view('admin.posts.index');
    }
}
