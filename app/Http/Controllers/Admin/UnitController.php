<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Feature;
use App\Models\Unit;
use App\Services\Admin\UnitService;

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

    public function details($id)
    {

        $unit = Unit::with(['owner', 'features', 'images'])->findOrFail($id);
        $featuresByCategory = $unit->features->groupBy('category.name');
        return view('dashboard.units.details', compact('unit',
            'featuresByCategory'));
    }

    public function create()
    {
        $featuresByCategory = Feature::with('category')->get()->groupBy(function ($feature) {
            return $feature->category->name;
        });
        return view('dashboard.units.create', compact('featuresByCategory'));
    }

    public function store(StoreUnitRequest $request)
    {
        $response = $this->service->store($request);
        if ($response['success']) {

            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->route('admin.show-unit');
    }


    public function edit($id)
    {
        $unit = Unit::with('features')->findOrFail($id);
        $featuresByCategory = Feature::with('category')->get()->groupBy(function ($feature) {
            return $feature->category->name;
        });
        return view('dashboard.units.edit', compact('unit', 'featuresByCategory'));
    }

    public function update(UpdateUnitRequest $request, $id)
    {
        $response = $this->service->update($request, $id);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }
        return redirect()->route('admin.show-unit');
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

    public function destroy($id)
    {

        $response = $this->service->destroy($id);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->back();
    }
}
