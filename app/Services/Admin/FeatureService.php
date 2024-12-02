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
            $feature = $category->features()->create([
                'name' => $request->input('feature_name'),
            ]);
            if ($category && $feature) {
                return [
                    'success' => true,
                    'message' => 'Feature added successfully',
                ];
            }
            return [
                'success' => false,
                'message' => 'Feature not added',
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

        try{
            $feature = Feature::findOrFail($request->input('feature_id'));
            if ($feature) {
                $feature->update([
                    'category_id' => $request->input('category_id'),
                    'name' => $request->input('feature_name'),
                ]);
                return [
                    'success' => true,
                    'message' => 'Feature updated successfully',
                ];
            }
            return [
                'success' => false,
                'message' =>'Feature not updated',
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function destroy($id){
        try{
            $feature = Feature::findOrFail($id);
            if ($feature) {
                $feature->delete();
                return [
                    'success' => true,
                    'message' => 'Feature deleted successfully',
                ];
            }
            return [
                'success' => false,
                'message' =>'Feature not deleted',
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }


    }

}
