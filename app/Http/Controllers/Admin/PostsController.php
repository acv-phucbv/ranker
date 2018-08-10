<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller as AdminController;

class PostsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
}
