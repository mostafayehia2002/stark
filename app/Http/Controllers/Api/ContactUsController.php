<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Services\Api\ContactUsService;
use App\Traits\HttpResponse;


class ContactUsController extends Controller
{
    use HttpResponse;

    //
    protected ContactUsService $contactUs;

    public function __construct(ContactUsService $contactUs)
    {

        $this->contactUs = $contactUs;
    }


    public function sendContactUsMessage(ContactUsRequest $request)
    {
        try {
            $response = $this->contactUs->sendContactUsMessage($request);
            if ($response['success']) {
                return $this->returnSuccessMessage(200, $response['message']);
            }
            return $this->returnErrorMessage(400, $response['message']);
        } catch (\Exception $exception) {
            return $this->returnErrorMessage(error: $exception->getMessage());
        }
    }
}
