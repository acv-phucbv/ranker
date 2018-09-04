<?php

namespace App\Services\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function createCategory(array $inputs);
    public function updateCategory(Category $category, array $inputs);
    public function searchCategory(Request $request);
    public function batchDelete(array $inputs);
}