<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected AdminService $adminService;
    public function __construct(AdminService $adminService){

        $this->adminService =$adminService;

    }
    //done ✅
    public function index(){
        $admins=User::where('type',UserType::ADMIN)->Paginate(10);
        return view('dashboard.admins.index',compact('admins'));
    }

    //done ✅
    public function create(){

        return view('dashboard.admins.create');
    }


    public function store(Request $request){
        $response=$this->adminService->store($request);

        return  $response;
    }
    //done ✅
    public function edit($id){
        $response=$this->adminService->edit($id);
        if($response['success']){
            return view('dashboard.admins.edit',['user'=>$response['user']]);
        }
        toastr()->error($response['message']);
        return redirect()->back();

    }

    public function update(Request $request, $id){

        $response=$this->adminService->update($request,$id);

        return  $response;
    }
    //done ✅
    public function destroy($id){
        $response=$this->adminService->destroy($id);
        if($response['success']){
          toastr()->success($response['message']);
            return redirect()->back();
        }
        toastr()->error($response['message']);
        return redirect()->back();
    }
}