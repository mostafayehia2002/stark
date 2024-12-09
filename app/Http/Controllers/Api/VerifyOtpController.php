<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyRequest;
use App\Services\Api\VerifyOtpService;
use App\Traits\HttpResponse;


class VerifyOtpController extends Controller
{
    use HttpResponse;

    protected VerifyOtpService $verifyOtpService;

    public function __construct(VerifyOtpService $verifyOtpService)
    {

        $this->verifyOtpService = $verifyOtpService;
    }

    public function verifyOtp(VerifyRequest $request)
    {
        $data = $request->validated();
        try {
            $verifyResponse = $this->verifyOtpService->verifyOtp($data['phone'], $data['otp'],$data['type']);
            if ($verifyResponse['success']) {
                return $this->returnData(
                    200,
                    [
                        'token' => $verifyResponse['token']
                    ]
                );
            }
            return $this->returnErrorMessage(400, $verifyResponse['message']);

        } catch (\Exception $exception) {

            return $this->returnErrorMessage($exception->getMessage());
        }
    }
}
