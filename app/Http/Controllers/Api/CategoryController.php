<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\Api\CategoryService;
use App\Traits\HttpResponse;


class CategoryController extends Controller
{
    use HttpResponse;

    protected CategoryService $featureService;

    public function __construct(CategoryService $featureService)
    {
        $this->featureService = $featureService;
    }

    public function getCategoryList()
    {
        try {
            $response = $this->featureService->getCategoryList();
            if ($response['success']) {
                return $this->returnData(200, CategoryResource::collection($response['data']));
            }
            return $this->returnErrorMessage(404, $response['message']);
        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }

    }
}
