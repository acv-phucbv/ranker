<?php

namespace App\Services\Production;

use App\Helpers\Helper;
use App\Models\Category;
use App\Services\Interfaces\CategoryServiceInterface;
use DB;
use Excel;
use Illuminate\Http\Request;

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
        $inputs['slug'] = str_slug($inputs['name']);
        return Category::create($inputs);
    }

    /* Update Category Data
    *
    * @param array $input
    * @param Category $category
    * @return Category
    */
    public function updateCategory(Category $category, array $inputs)
    {
        $inputs['slug'] = str_slug($inputs['name']);
        return $category->update($inputs);
    }

    /**
     * filter categories
     *
     * @param array $param
     * @return $category
     * */
    public function searchCategory(Request $request)
    {
        $query = Category::query();

        if (!empty($request->input('search'))) {
            $query->where('name', 'like', "%{$request->input('search')}%");
        }

        if (!empty($request->input('search'))) {
            $query->where('description', 'like', "%{$request->input('search')}%");
        }

        if (!empty($request->input('limit'))) {
            $limit = $request->input('limit');
        } else {
            $limit = Helper::ITEM_PER_PAGE;
        }

        if (!empty($request->input('sort'))) {
            $order = $request->input('order', 'asc');
            if ($request->input('sort') === 'count') {
                $query->withCount('posts')->orderBy('posts_count', $order);
            } else {
                $query->orderBy("{$request->input('sort')}", $order);
            }

        }

        return $query->paginate($limit);
    }

    /**
     * Destroy multiple categories
     *
     * @param array $inputs
     * @return bool
     */
    public function batchDelete(array $inputs)
    {
        return Category::destroy($inputs);
    }
}
