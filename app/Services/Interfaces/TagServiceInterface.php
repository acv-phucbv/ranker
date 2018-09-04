<?php

namespace App\Services\Interfaces;

use App\Models\Tag;
use Illuminate\Http\Request;

interface TagServiceInterface
{
    public function createTag(array $inputs);
    public function updateTag(Tag $tag, array $inputs);
    public function searchTag(Request $request);
    public function batchDelete(array $inputs);
}