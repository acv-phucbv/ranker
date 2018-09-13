<?php

namespace App\Services\Interfaces;

use App\Models\Post;
use Illuminate\Http\Request;

interface PostServiceInterface
{
    public function createPost(array $inputs);
    public function update(Post $tag, array $inputs);
    public function searchPost(Request $request);
    public function batchDelete(array $inputs);
}