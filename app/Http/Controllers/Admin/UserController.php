<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\UserService;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService){

        $this->userService = $userService;
    }
    //
    public function index(){

      $users=  User::whereIn('type',[UserType::RENTER,UserType::OWNER])->paginate(15);
      return view('dashboard.users.index',compact('users'));
    }

    public function destroy($id){
        $response = $this->userService->destroy($id);
        if($response){
           toastr()->success($response['message']);
        }else{
            toastr()->error($response['message']);
        }
        return redirect()->route('admin.show-users');
    }

    public function blockUser($id){

        $response = $this->userService->blockUser($id);
        if($response) {
            toastr()->success($response['message']);
        }
        return redirect()->route('admin.show-users');
    }

    public function show($id)
    {
      $user=User::with('units')->find($id);


      return view('dashboard.users.show',compact('user' ));
    }

}
