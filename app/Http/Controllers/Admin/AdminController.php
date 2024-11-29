<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Models\User;
use App\Services\Admin\AdminService;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    protected AdminService $adminService;

    public function __construct(AdminService $adminService)
    {

        $this->adminService = $adminService;

    }

    //done ✅
    public function index()
    {
        $admins = User::where('type', UserType::ADMIN)->Paginate(10);
        return view('dashboard.admins.index', compact('admins'));
    }

    //done ✅
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('dashboard.admins.create', compact('roles'));
    }

    //done ✅
    public function store(StoreAdminRequest $request)
    {

        $response = $this->adminService->store($request);
        if ($response['success']) {
            toastr()->success($response['message']);
            return redirect()->route('admin.show-admins');
        }
        toastr()->error($response['message']);
        return redirect()->back()->withInput($request->all());
    }

    //done ✅
    public function edit($id)
    {
        $response = $this->adminService->edit($id);
        if ($response['success']) {
            return view('dashboard.admins.edit', ['user' => $response['user'], 'roles' => $response['roles'], 'userRole' => $response['userRole']]);
        }
        toastr()->error($response['message']);
        return redirect()->back();

    }

    public function update(StoreAdminRequest $request, $id)
    {

        $response = $this->adminService->update($request, $id);
        if ($response['success']) {
            toastr()->success($response['message']);
            return redirect()->route('admin.show-admins');
        }
        toastr()->error($response['message']);
        return redirect()->back()->withInput($request->all());

    }

    //done ✅
    public function destroy($id)
    {
        $response = $this->adminService->destroy($id);
        if ($response['success']) {
            toastr()->success($response['message']);
            return redirect()->back();
        }
        toastr()->error($response['message']);
        return redirect()->back();
    }


    public function blockAdmin($id)
    {
        $response=$this->adminService->blockAdmin($id);
       if($response['success']){
           toastr()->success($response['message']);
       }else{
           toastr()->error($response['message']);
       }
        return redirect()->back();
    }

}
