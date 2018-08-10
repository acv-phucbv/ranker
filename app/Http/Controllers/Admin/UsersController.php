<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller as AdminController;

class UsersController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
