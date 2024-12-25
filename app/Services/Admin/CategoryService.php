<?php

namespace App\Services\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
class CategoryService
{

    public function store(CategoryRequest $request): array
    {
        try {
            Category::create(['name' => [
                'en' => $request->input('name_en'),
                'ar' => $request->input('name_ar')],
            ]);
            return [
                'success' => true,
                'message' => translate_message('success_added')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(CategoryRequest $request): array
    {
        try {
            $id = $request->input('id');
            $category = Category::findOrFail($id);
            $category->update(['name' =>[
                'en' => $request->input('name_en'),
                'ar' => $request->input('name_ar')],
            ]);
            return [
                'success' => true,
                'message' => translate_message('success_updated')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function destroy($id): array
    {
        try {
            Category::findOrFail($id)->delete();
            return [
                'success' => true,
                'message' => translate_message('success_deleted')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

    }

}

