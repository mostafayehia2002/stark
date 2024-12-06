<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingRequest;
use App\Models\Feature;
use App\Services\TwilioService;
use Illuminate\Http\Request;

class BookingRequestController extends Controller
{
    protected TwilioService $service;

    public function __construct(TwilioService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
      $booking_requests= BookingRequest::with(['unit'])->orderBy('created_at', 'DESC')->paginate(15);

        return view('dashboard.bookings.show_booking_requests', compact('booking_requests'));
    }



    public function details($id)
    {
       $request= BookingRequest::with(['user','unit'])->where('id',$id)->first();
        $featuresByCategory = $request->unit->features->groupBy('category.name');
       return  view('dashboard.bookings.booking_request_details',compact('request',
       'featuresByCategory'));
    }

    public function changeStatus(Request $request){

       $booking_request= BookingRequest::where('id',$request->input('request_id'))->first();
        $booking_request->update(['status'=>$request->input('status')]);
        toastr()->success('Status Changed Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        try {
           $request= BookingRequest::where('id',$id)->first();
                $request->delete();
            toastr()->success('Deleted Successfully');
        } catch (\Exception $exception) {

            toastr()->error($exception->getMessage());
        }
        return redirect()->back();
    }
}
