<?php

namespace App\Services\Production;

use App\Models\Category;
use App\Services\Interfaces\CategoryServiceInterface;
use DB;
use Excel;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    /**
     * Create new category
     *
     * @param array $inputs
     * @return Category
     * @throws \Exception
     */
    public function createCategory(array $inputs)
    {
        $inputs['slug'] = str_slug($inputs['category']);
        return Category::create($inputs);
    }

    /*

     * Delete Category Data
     *
     * @param Category $category
     *
     * @return Bool
     */
    public function deleteCategory(Category $category)
    {
        return $category->delete();
    }

    /* Update Category Data
    *
    * @param array $input
    * @param Category $category
    * @return Category
    */
    public function updateCategory(Category $category, array $inputs)
    {
        return $category->update($inputs);
    }

    /**
     * filter categories
     *
     * @param array $param
     * @return $category
     * */
    public function searchCategory(array $param)
    {
        $category = Category::query()->with([
            'category',
            'slug',
            'description'
        ]);

        if (!empty($param['keyword'])) {
            $category->filter($param['keyword']);
        }

        if (!empty($param['category'])) {
            $category->where('category', $param['category']);
        }

        if (!empty($param['slug'])) {
            $category->where('slug', $param['slug']);
        }

        if (!empty($param['description'])) {
            $category->where('description', $param['description']);
        }

        return $category->orderBy('order', 'ASC')->paginate(config('constants.per_page'));
    }
}
