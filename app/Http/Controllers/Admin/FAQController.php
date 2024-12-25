<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use App\Services\Admin\FAQService;

class FAQController extends Controller
{
    //
    protected FAQService $FAQService;

    public function __construct(FAQService $FAQService)
    {

        $this->FAQService = $FAQService;
    }

    public function index()
    {

        $faqs = FAQ::orderBy('created_at', 'desc')->get();
        return view('dashboard.FAQ.index', compact('faqs'));
    }
    public function create()
    {
        return view('dashboard.FAQ.create');
    }
    public function store(FAQRequest $request)
    {
        $response = $this->FAQService->store($request);

        if ($response) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->route('admin.FAQ-list');

    }
    public function edit($id)
    {
        $faq = FAQ::FindOrFail($id);
        return view('dashboard.FAQ.edit', compact('faq'));
    }
    public function update(FAQRequest $request, $id)
    {
        $response = $this->FAQService->update($request, $id);

        if ($response) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->route('admin.FAQ-list');

    }
    public function destroy($id)
    {
        $response = $this->FAQService->destroy($id);
        if ($response['success']) {
            toastr()->success($response['message']);
        } else {
            toastr()->error($response['message']);
        }

        return redirect()->back();


    }
}
