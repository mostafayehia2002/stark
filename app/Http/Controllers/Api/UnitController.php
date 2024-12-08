<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Http\Resources\UnitDetailsResource;
use App\Http\Resources\UnitResource;
use App\Services\Admin\UnitAdminService;
use App\Services\Api\UnitApiService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    use HttpResponse;

    //
    protected UnitApiService $ApiService;
    protected UnitAdminService $AdminService;

    public function __construct(UnitApiService $ApiService,UnitAdminService $AdminService)
    {
        $this->ApiService = $ApiService;
        $this->AdminService = $AdminService;

    }

    public function getUnitType()
    {
        try {
            $types = $this->ApiService->getUnitType();
            return $this->returnData(200,   $types);
        } catch (\Exception $exception) {

            return $this->returnErrorMessage(error: $exception->getMessage());
        }

    }

    public function getAllUnits(Request $request)
    {
        try {
            $response = $this->ApiService->getAllUnits($request);
            if ($response['success']) {
                return $this->returnPaginatedData(UnitResource::collection($response['data']));
            }
            return $this->returnErrorMessage(404, error: $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(error: $exception->getMessage());
        }

    }

    public function getUnitDetails($id)
    {
        try {
            $response = $this->ApiService->getUnitDetails($id);
            if ($response['success']) {
                return $this->returnData(data: new UnitDetailsResource(($response['data'])));
            }
            return $this->returnErrorMessage(404, error: $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(error: $exception->getMessage());
        }

    }

    public function store(StoreUnitRequest $request)
    {
        try {
            $response = $this->AdminService->store($request);
            if ($response['success']) {
                return $this->returnSuccessMessage(201, $response['message']);
            }
            return $this->returnErrorMessage(400, $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(error: $exception->getMessage());
        }

    }
    public function update(UpdateUnitRequest $request,$id)
    {
        try {
            $response = $this->AdminService->update($request,$id);
            if ($response['success']) {
                return $this->returnSuccessMessage(200,$response['message']);
            }
            return $this->returnErrorMessage(400, $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(error: $exception->getMessage());
        }

    }
    public function destroy($id)
    {
        try {
            $response = $this->AdminService->destroy($id);
            if ($response['success']) {
                return $this->returnSuccessMessage(200,$response['message']);
            }
            return $this->returnErrorMessage(400, $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(error: $exception->getMessage());
        }

    }
}
