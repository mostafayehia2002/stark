<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Category;
use App\Models\Feature;
use App\Services\Admin\FeatureService;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    //
    protected FeatureService $featureService;

    public function __construct(FeatureService $featureService)
    {
        $this->featureService = $featureService;
    }

    public function index()
    {

        $categories = Category::all();
        $features = Feature::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.features.index', compact('features', 'categories'));
    }

    public function store(StoreFeatureRequest $request)
    {
        $response = $this->featureService->store($request);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->back();

    }


    public function update(UpdateFeatureRequest $request)
    {
        $response = $this->featureService->update($request);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $response = $this->featureService->destroy($id);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->back();

    }

}
