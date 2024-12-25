<?php

namespace App\Services\Admin;

use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Category;
use App\Models\Feature;
class FeatureService
{

    public function store(StoreFeatureRequest $request)
    {

        try {
            $category = Category::find($request->input('category_id'));
            $category->features()->create([
                'name' => [
                    'en' => $request->input('name_en'),
                    'ar' => $request->input('name_ar')
                ],
            ]);
            return [
                'success' => true,
                'message' => translate_message('success_added'),
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(UpdateFeatureRequest $request)
    {
        try {
            $feature = Feature::findOrFail($request->input('feature_id'));
            $feature->update([
                'category_id' => $request->input('category_id'),
                'name' => ['en' => $request->input('name_en'), 'ar' => $request->input('name_ar')],
            ]);
            return [
                'success' => true,
                'message' => translate_message('success_updated'),
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
                'message' => translate_message('success_deleted'),
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }


    }

}
