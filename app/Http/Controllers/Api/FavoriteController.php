<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\UnitResource;
use App\Services\Api\FavoriteService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use function Laravel\Prompts\text;

class FavoriteController extends Controller
{
    use HttpResponse;

    protected FavoriteService $favoriteService;

    public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    public function store(FavoriteRequest $request)
    {
        try {
            $response = $this->favoriteService->store($request);
            return $this->returnSuccessMessage($response['status'], $response['message']);
        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $response = $this->favoriteService->destroy($id);
            if ($response['success']) {
                return $this->returnSuccessMessage(200, $response['message']);
            }
            return $this->returnErrorMessage(404, $response['message']);
        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }

    }

    public function getAllFavorites()
    {
        try {
            $response = $this->favoriteService->getAllFavorites();
            if ($response['success']) {
                return $this->returnData(200, UnitResource::collection($response['data']));
            }
            return $this->returnErrorMessage(404, $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }
}
