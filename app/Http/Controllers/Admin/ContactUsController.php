<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ContactUs;
use App\Services\Admin\ContactUsService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    protected ContactUsService $contactUs;
    public function __construct(ContactUsService $contactUs){

        $this->contactUs = $contactUs;
    }

    public function index(){

      $contacts=ContactUs::orderBy('created_at', 'desc')->Paginate(15);
        return view('dashboard.contact_us.index',compact('contacts'));
    }

    public function read($id)
    {
        $response=$this->contactUs->read($id);
        if($response['success']){
            toastr()->success($response['message']);
        }else{
            toastr()->error($response['message']);
        }
       return redirect()->back();
    }

    public function delete($id){

        $response=$this->contactUs->delete($id);
        if($response['success']){
            toastr()->success($response['message']);
        }else{
            toastr()->error($response['message']);
        }
        return redirect()->back();
    }
}
