<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\BookingRequest;
use App\Services\Admin\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected BookingService $bookingService;
    //
    public function __construct(BookingService $bookingService){

        return $this->bookingService = $bookingService;
    }

    public function index(){

       $bookings= booking::paginate(15);
        return view('dashboard.bookings.index',compact('bookings'));
    }
    public function details($id)
    {
        $request = BookingRequest::with(['user', 'unit','owner','booking'])->where('booking_id', $id)->first();
        $featuresByCategory = $request->unit->features->groupBy('category.name');
        return view('dashboard.bookings.details', compact('request',
            'featuresByCategory'));
    }

    public function destroy($id){

        $response=$this->bookingService->destroy($id);
        if($response['success']){
            toastr()->success($response['message']);
        }
        else{
            toastr()->error($response['message']);
        }
        return redirect()->back();
    }
}
