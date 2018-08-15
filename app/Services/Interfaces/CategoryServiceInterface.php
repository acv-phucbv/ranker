<?php

namespace App\Services\Interfaces;

use App\Models\Category;

interface CategoryServiceInterface
{
    public function createCategory(array $inputs);
    public function deleteCategory(Category $category);
    public function updateCategory(Category $category, array $inputs);
    public function searchCategory(array $param);
}