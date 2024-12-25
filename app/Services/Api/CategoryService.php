<?php

namespace App\Services\Api;
use App\Models\Category;
class CategoryService
{

    public function getCategoryList(): array
    {

        $categories =Category::with('features')->get();
           if(!$categories->isEmpty()){
               return [
                   'success' => true,
                   'data' => $categories,
               ];
           }
        return [
            'success' => false,
            'message'=>translate_message('no_data_found'),
        ];
    }

}
