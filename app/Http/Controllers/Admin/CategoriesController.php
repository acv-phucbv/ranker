<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BatchDeleteCategoriesRequest;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\DeleteCategoriesRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller as AdminController;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoriesController extends AdminController
{
    /**
     * @var CategoryServiceInterface
     */
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function index(Request $request) {
        $order = ($order = $request->input('order')) ? ($order == 'asc' ? 'desc' : 'asc') : 'desc';
        $categories = $this->categoryService->searchCategory($request);

        return view('admin.categories.index', compact('categories', 'request', 'order'));
    }

    public function store(CreateCategoryRequest $request) {
        if ($staff = $this->categoryService->createCategory($request->except('_token'))) {
            $request->session()->flash('flash_success', trans('common.create_success'));
            return redirect(route('admin.categories.index'));
        }

        abort(500, trans('common.create_faild'));
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, UpdateCategoryRequest $request) {
        if ($this->categoryService->updateCategory($category, $request->except(['_method', '_token']))) {
            $request->session()->flash('flash_success', trans('common.update_success'));
            return redirect(route('admin.categories.edit', $category));
        }

        abort(500, trans('common.update_faild'));
    }

    public function batchDestroy(BatchDeleteCategoriesRequest $request)
    {
        if ($this->categoryService->batchDelete($request->input('ids'))) {
            session()->flash('flash_warning', trans('common.delete_success'));
            return redirect(route('admin.categories.index'));
        }
        abort(500, trans('common.delete_failed'));
    }
}
