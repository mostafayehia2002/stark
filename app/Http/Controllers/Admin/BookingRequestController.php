<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingRequest;
use App\Services\Admin\BookingRequestService;
use App\Services\TwilioService;
use Illuminate\Http\Request;

class BookingRequestController extends Controller
{
    protected BookingRequestService $bookingRequestService;

    public function __construct(BookingRequestService $bookingRequestService)
    {
        $this->bookingRequestService = $bookingRequestService;
    }

    public function index()
    {
        $booking_requests = BookingRequest::with(['unit'])->orderBy('created_at', 'DESC')->paginate(15);

        return view('dashboard.bookings.requests.index', compact('booking_requests'));
    }


    public function details($id)
    {
        $request = BookingRequest::with(['user', 'unit'])->where('id', $id)->first();
        $featuresByCategory = $request->unit->features->groupBy('category.name');
        return view('dashboard.bookings.requests.details', compact('request',
            'featuresByCategory'));
    }

    public function changeStatus(Request $request)
    {
        $response = $this->bookingRequestService->changeStatus($request);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->back();
    }


    public function destroy($id)
    {
        $response = $this->bookingRequestService->destroy($id);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->back();
    }
}
