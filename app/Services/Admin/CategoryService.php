<?php

namespace App\Services\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{

    public function store(Request $request): array
    {
        try {
             Category::create($request->only('name'));
             return [
                    'success' => true,
                    'message' => 'Successfully Created'
                ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(Request $request): array
    {
        try {
            $id = $request->input('id');
            $category =Category::findOrFail($id);
            $category->update($request->only('name'));
                return [
                    'success' => true,
                    'message' => 'Successfully Updated'
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
                'message' => 'Successfully Deleted'
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

    }

}

