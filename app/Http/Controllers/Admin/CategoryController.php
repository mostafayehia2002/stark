<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    //
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $response = $this->categoryService->store($request);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->back();
    }


    public function update(CategoryRequest $request)
    {
        $response = $this->categoryService->update($request);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->back();

    }

    public function destroy($id)
    {
        $response = $this->categoryService->destroy($id);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->back();
    }

}
