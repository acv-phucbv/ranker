<?php

namespace App\Services\Production;

use App\Models\Tag;
use App\Services\Interfaces\TagServiceInterface;
use DB;
use Excel;

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

    /*

     * Delete Tag Data
     *
     * @param Tag $tag
     *
     * @return Bool
     */
    public function deleteTag(Tag $tag)
    {
        return $tag->delete();
    }

    /* Update Tag Data
    *
    * @param array $input
    * @param Tag $tag
    * @return Tag
    */
    public function updateTag(Tag $tag, array $inputs)
    {
        return $tag->update($inputs);
    }

    /**
     * filter tags
     *
     * @param array $param
     * @return $tags
     * */
    public function searchTag(array $param)
    {
        $tag = Tag::query()->with([
            'name',
            'slug',
            'description'
        ]);

        if (!empty($param['keyword'])) {
            $tag->filter($param['keyword']);
        }

        if (!empty($param['name'])) {
            $tag->where('name', $param['name']);
        }

        if (!empty($param['slug'])) {
            $tag->where('slug', $param['slug']);
        }

        if (!empty($param['description'])) {
            $tag->where('description', $param['description']);
        }

        return $tag->orderBy('order', 'ASC')->paginate(config('constants.per_page'));
    }
}
