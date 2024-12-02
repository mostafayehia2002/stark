<?php

namespace App\Services\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{

    public function store(Request $request): array
    {
        try {
            $category = Category::create($request->only('name'));
            if ($category) {
                return [
                    'success' => true,
                    'message' => 'Successfully Created'
                ];
            }
            return [
                'success' => false,
                'message' => 'Failed to Created'
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
            $category = Category::find($id);
            if ($category) {
                $category->update($request->only('name'));

                return [
                    'success' => true,
                    'message' => 'Successfully Updated'
                ];
            }
            return [
                'success' => false,
                'message' => 'Failed to Updated'
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
            $category = Category::find($id);
            if ($category) {
                $category->delete();
                return [
                    'success' => true,
                    'message' => 'Successfully Deleted'
                ];
            }
            return [
                'success' => false,
                'message' => 'Failed to Deleted'
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

    }

}

