<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserProfileResource;
use App\Services\Api\UserProfileService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class UserProfileController extends Controller
{
    use HttpResponse;

    //
    protected UserProfileService $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {

        $this->userProfileService = $userProfileService;
    }

    public function profile()
    {

        try {
            $response = $this->userProfileService->profile();

            return $this->returnData(200,  new UserProfileResource($response['data']));

        } catch (\Exception $exception) {

            return $this->returnErrorMessage(error: $exception->getMessage());
        }
    }

    public function updateProfile(UserRegisterRequest $request)
    {
        try {
            $response = $this->userProfileService->updateProfile($request);
            if ($response['success']) {
                return $this->returnData(200, new UserProfileResource($response['data']));
            }
            return $this->returnErrorMessage(400, error: $response['message']);
        } catch (\Exception $exception) {

            return $this->returnErrorMessage(error: $exception->getMessage());
        }
    }
}
