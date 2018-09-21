<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BatchDeletePostsRequest;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller as AdminController;

class PostsController extends AdminController
{
    /**
     * @var PostServiceInterface
     */
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        parent::__construct();
        $this->postService = $postService;
    }

    public function index(Request $request) {
        $order = ($order = $request->input('order')) ? ($order == 'asc' ? 'desc' : 'asc') : 'desc';
        $posts = $this->postService->searchPost($request);

        return view('admin.posts.index', compact('posts', 'request', 'order'));
    }

    public function create() {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(CreatePostRequest $request) {
        if ($staff = $this->postService->createPost($request->except('_token'))) {
            $request->session()->flash('flash_success', trans('common.create_success'));
            return redirect(route('admin.posts.index'));
        }

        abort(500, trans('common.create_faild'));
    }

    public function edit(Post $post) {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $postTags = [];
        foreach ($post->tags as $tag) {
            $postTags[] = $tag->id;
        }
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'postTags'));
    }

    public function update(Post $post, UpdatePostRequest $request) {
        if ($this->postService->update($post, $request->except(['_method', '_token']))) {
            $request->session()->flash('flash_success', trans('common.update_success'));
            return redirect(route('admin.posts.edit', $post));
        }

        abort(500, trans('common.update_faild'));
    }

    public function batchDestroy(BatchDeletePostsRequest $request)
    {
        if ($this->postService->batchDelete($request->input('ids'))) {
            session()->flash('flash_warning', trans('common.delete_success'));
            return redirect(route('admin.posts.index'));
        }
        abort(500, trans('common.delete_failed'));
    }
}
