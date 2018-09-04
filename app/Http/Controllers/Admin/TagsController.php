<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BatchDeleteTagsRequest;
use App\Http\Requests\Admin\CreateTagRequest;
use App\Http\Requests\Admin\UpdateTagRequest;
use App\Models\Tag;
use App\Http\Controllers\Admin\Controller as AdminController;
use App\Services\Interfaces\TagServiceInterface;
use Illuminate\Http\Request;

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

    public function index(Request $request) {
        $order = ($order = $request->input('order')) ? ($order == 'asc' ? 'desc' : 'asc') : 'desc';
        $tags = $this->tagService->searchTag($request);

        return view('admin.tags.index', compact('tags', 'request', 'order'));
    }

    public function store(CreateTagRequest $request) {
        if ($staff = $this->tagService->createTag($request->except('_token'))) {
            $request->session()->flash('flash_success', trans('common.create_success'));
            return redirect(route('admin.tags.index'));
        }

        abort(500, trans('common.create_faild'));
    }

    public function edit(Tag $tag) {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Tag $tag, UpdateTagRequest $request) {
        if ($this->tagService->updateTag($tag, $request->except(['_method', '_token']))) {
            $request->session()->flash('flash_success', trans('common.update_success'));
            return redirect(route('admin.tags.edit', $tag));
        }

        abort(500, trans('common.update_faild'));
    }

    public function batchDestroy(BatchDeleteTagsRequest $request)
    {
        if ($this->tagService->batchDelete($request->input('ids'))) {
            session()->flash('flash_warning', trans('common.delete_success'));
            return redirect(route('admin.tags.index'));
        }
        abort(500, trans('common.delete_failed'));
    }
}
