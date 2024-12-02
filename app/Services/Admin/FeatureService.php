<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureService
{

    public function store(Request $request)
    {

        try {
            $category = Category::find($request->input('category_id'));
            $category->features()->create([
                'name' => $request->input('feature_name'),
            ]);
            return [
                'success' => true,
                'message' => 'Feature added successfully',
            ];

        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(Request $request)
    {
        try {
            $feature = Feature::findOrFail($request->input('feature_id'));
            $feature->update([
                'category_id' => $request->input('category_id'),
                'name' => $request->input('feature_name'),
            ]);
            return [
                'success' => true,
                'message' => 'Feature updated successfully',
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function destroy($id)
    {
        try {
            Feature::findOrFail($id)->delete();
            return [
                'success' => true,
                'message' => 'Feature deleted successfully',
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }


    }

}
