<?php

namespace App\Services\Interfaces;

use App\Models\Tag;

interface TagServiceInterface
{
    public function createTag(array $inputs);
    public function deleteTag(Tag $tag);
    public function updateTag(Tag $tag, array $inputs);
    public function searchTag(array $param);
}