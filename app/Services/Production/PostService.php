<?php

namespace App\Services\Production;

use App\Helpers\Helper;
use App\Models\Post;
use App\Services\Interfaces\PostServiceInterface;
use Carbon\Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostService extends BaseService implements PostServiceInterface
{
    /**
     * Create new post
     *
     * @param array $inputs
     * @return Post
     * @throws \Exception
     */
    public function createPost(array $inputs)
    {
        return DB::transaction(function () use ($inputs) {
            $inputs['slug'] = str_slug($inputs['title']);

            if (isset($inputs['feature_image'])) {
                $image = $inputs['feature_image'];
                $fileName = $inputs['slug'] . '.' . $image->getClientOriginalExtension();
                $subpath = Carbon::parse(now())->format('Y/m/d');
                $location = public_path('uploads/images' . DIRECTORY_SEPARATOR . $subpath);
                $image->move($location, $fileName);
                $inputs['feature_image'] = $fileName;
            }

            $inputs['auth_id'] = Auth::user()->id;

            $post = Post::create($inputs);

            if (isset($inputs['tags_id'])) {
                $post->tags()->sync($inputs['tags_id'], false);
            }

            return $post;
        });
    }

    /* Update Post Data
    *
    * @param array $input
    * @param Post $post
    * @return Post
    */
    public function update(Post $post, array $inputs)
    {
        return DB::transaction(function () use ($post, $inputs) {
            $inputs['slug'] = str_slug($inputs['title']);

            if (isset($inputs['feature_image'])) {
                $oldImage = $post->feature_image;
                Storage::delete($oldImage);
                $image = $inputs['feature_image'];
                $fileName = $inputs['slug'] . '.' . $image->getClientOriginalExtension();
                $subpath = Carbon::parse($post->created_at)->format('Y/m/d');
                $location = public_path('uploads/images' . DIRECTORY_SEPARATOR . $subpath);
                $image->move($location, $fileName);
                $inputs['feature_image'] = $fileName;
            }

            $inputs['auth_id'] = Auth::user()->id;

            $post->update($inputs);

            if (isset($inputs['tags_id'])) {
                $post->tags()->sync($inputs['tags_id']);
            } else {
                $post->tags()->sync([]);
            }

            return true;
        });
    }

    /**
     * filter posts
     *
     * @param array $param
     * @return $posts
     * */
    public function searchPost(Request $request)
    {
        $query = Post::query();

        if (!empty($request->input('search'))) {
            $query->where('title', 'like', "%{$request->input('search')}%");
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

        return $query->paginate($limit);
    }

    /**
     * Destroy multiple posts
     *
     * @param array $inputs
     * @return bool
     */
    public function batchDelete(array $inputs)
    {
        return Post::destroy($inputs);
    }
}
