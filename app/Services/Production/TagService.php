<?php

namespace App\Services\Production;

use App\Helpers\Helper;
use App\Models\Tag;
use App\Services\Interfaces\TagServiceInterface;
use DB;
use Excel;
use Illuminate\Http\Request;

class TagService extends BaseService implements TagServiceInterface
{
    /**
     * Create new user
     *
     * @param array $inputs
     * @return Tag
     * @throws \Exception
     */
    public function createTag(array $inputs)
    {
        $inputs['slug'] = str_slug($inputs['name']);
        return Tag::create($inputs);
    }

    /* Update Tag Data
    *
    * @param array $input
    * @param Tag $tag
    * @return Tag
    */
    public function updateTag(Tag $tag, array $inputs)
    {
        $inputs['slug'] = str_slug($inputs['name']);
        return $tag->update($inputs);
    }

    /**
     * filter tags
     *
     * @param array $param
     * @return $tags
     * */
    public function searchTag(Request $request)
    {
        $query = Tag::query();

        if (!empty($request->input('search'))) {
            $query->where('name', 'like', "%{$request->input('search')}%");
        }

        if (!empty($request->input('search'))) {
            $query->where('slug', 'like', "%{$request->input('search')}%");
        }

        if (!empty($request->input('search'))) {
            $query->where('description', 'like', "%{$request->input('search')}%");
        }

        if (!empty($request->input('sort'))) {
            $order = $request->input('order', 'asc');
            $query->orderBy("{$request->input('sort')}", $order);
        }

        if (!empty($request->input('limit'))) {
            $limit = $request->input('limit');
        } else {
            $limit = Helper::ITEM_PER_PAGE;
        }

        return $query->select('id', 'name', 'slug', 'description')->paginate($limit);
    }

    /**
     * Destroy multiple tags
     *
     * @param array $inputs
     * @return bool
     */
    public function batchDelete(array $inputs)
    {
        return Tag::destroy($inputs);
    }
}
