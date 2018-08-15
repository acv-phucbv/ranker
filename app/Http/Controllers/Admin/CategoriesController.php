<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCategoryRequest;
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

    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(CreateCategoryRequest $request) {
        if ($staff = $this->categoryService->createCategory($request->except('_token'))) {
            $request->session()->flash('flash_success', trans('common.create_success'));
            return redirect(route('admin.categories.index'));
        }

        abort(500, trans('common.create_faild'));
    }
}
