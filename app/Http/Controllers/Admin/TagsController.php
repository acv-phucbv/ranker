<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTagRequest;
use App\Http\Requests\Admin\DeleteTagsRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller as AdminController;
use App\Services\Interfaces\TagServiceInterface;

class TagsController extends AdminController
{
    /**
     * @var TagServiceInterface
     */
    protected $tagService;

    public function __construct(TagServiceInterface $tagService)
    {
        parent::__construct();
        $this->tagService = $tagService;
    }

    public function index() {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function store(CreateTagRequest $request) {
        if ($staff = $this->tagService->createTag($request->except('_token'))) {
            $request->session()->flash('flash_success', trans('common.create_success'));
            return redirect(route('admin.tags.index'));
        }

        abort(500, trans('common.create_faild'));
    }

    public function show(Tag $tag) {
        return view('admin.tags.show', compact('tag'));
    }

    public function update(Tag $tag) {
        return view('admin.tags.show', compact('tag'));
    }

    public function destroy(Tag $tag, DeleteTagsRequest $request) {
        if ($this->tagService->deleteTag($tag)) {
            $request->session()->flash('flash_success', trans('common.delete_success'));
            return redirect(route('admin.tags.index'));
        }

        $request->session()->flash('flash_danger', trans('common.delete_faild'));
        return redirect(route('admin.tags.index'));
    }
}
