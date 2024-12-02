<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitStatus;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Services\Admin\UnitService;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected UnitService $service;

    public function __construct(UnitService $service)
    {

        $this->service = $service;
    }

    public function index()
    {
        $units = Unit::orderBy('created_at', 'DESC')->paginate(15);


        return view('dashboard.units.index', compact('units'));

    }

    public function changeStatus($id, $status)
    {
        $response = $this->service->changeStatus($id, $status);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->back();
    }
    public function destroy($id){

        $response = $this->service->destroy($id);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->back();
    }
}
