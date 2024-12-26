<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FAQResource;
use App\Services\Api\FAQService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    use HttpResponse;

    protected FAQService $faqService;

    public function __construct(FAQService $faqService)
    {
        $this->faqService = $faqService;

    }

    public function getAllFAQ()
    {
        try {
            $result = $this->faqService->getAllFAQ();
            if ($result['success']) {
                return $this->returnData(200,
                    FAQResource::collection($result['data'])
                );
            }
            return $this->returnErrorMessage(404, $result['message']);
        } catch (\Exception $exception) {

            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }
}
