<?php

namespace App\Http\Controllers\Api;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingUnitRequest;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Resources\BookingRequestDetailsResource;
use App\Http\Resources\BookingRequestResource;
use App\Services\Api\BookingRequestService;
use App\Traits\HttpResponse;


class BookingRequestController extends Controller
{
    use HttpResponse;

    //
    protected BookingRequestService $bookingRequestService;

    public function __construct(BookingRequestService $bookingRequestService)
    {
        $this->bookingRequestService = $bookingRequestService;
    }

    public function getAllBookingRequests()
    {
        try {

            $response = $this->bookingRequestService->getAllBookingRequests();
            if ($response['success']) {

                return $this->returnPaginatedData(BookingRequestResource::collection($response['data']));
            }
            return $this->returnErrorMessage(404, $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }

    public function details($id)
    {
        try {
            $response = $this->bookingRequestService->details($id);
            if ($response['success']) {
                return $this->returnData(200, new BookingRequestDetailsResource($response['data']));
            }
            return $this->returnErrorMessage(404, $response['message']);
        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }

    public function getStatus()
    {
      return $this->returnData(200,BookingStatus::cases());

    }
    public function changeStatus(ChangeStatusRequest $request)
    {
        try {
            $response = $this->bookingRequestService->changeStatus($request);
            if ($response['success']){
                return $this->returnSuccessMessage(200, $response['message']);
            }
            return $this->returnErrorMessage(404, $response['message']);

        } catch (\Exception $exception) {
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }

    public function destroy($id){
        try{
        $response = $this->bookingRequestService->destroy($id);
        if ($response['success']){
            return $this->returnSuccessMessage(200, $response['message']);
        }
        return $this->returnErrorMessage(404, $response['message']);
        }catch (\Exception $exception){
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }


    public function store(BookingUnitRequest $request)
    {
        try {
        $response=$this->bookingRequestService->store($request);
        if ($response['success']){
            return $this->returnSuccessMessage(200, $response['message']);
        }
        return $this->returnErrorMessage(404, $response['message']);

        }catch (\Exception $exception){
            return $this->returnErrorMessage(500, $exception->getMessage());
        }
    }
}
