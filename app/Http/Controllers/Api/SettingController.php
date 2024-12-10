<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Services\Api\SettingService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use HttpResponse;

    //
    protected SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function getSetting()
    {
        try {
            $response = $this->settingService->getSetting();
            if ($response['success']) {
                return $this->returnData(200,new SettingResource($response['data']));
            }
            return $this->returnData(404, $response['message']);
        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }

}
