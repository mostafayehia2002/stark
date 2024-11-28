<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminService
{
    public function store(Request $request):array
    {
        return[

        ];
    }
    public function edit($id): array
    {
        $user=User::find($id);
        $roles = Role::pluck('name','name')->all();
        if($user){
            return [
                'success'=>true,
                'user'=>$user,
                'roles'=>$roles
            ];
        }
        return[
            'success'=>false,
            'message'=>'Admin Not Found'
        ];

    }
    public function update(Request $request ,$id): array{

        //DB::table('model_has_roles')->where('model_id',$id)->delete();

       // $user->assignRole($request->input('roles'));
        return [

        ];
    }
    public function destroy($id): array{
        $user=User::find($id);
        if($user && auth()->id()!=$user->id){
            $user->delete();
            return [
                'success'=>true,
                'message'=>'Admin Deleted Successfully'
            ];
        }
        return[
            'success'=>false,
            'message'=>'Error while Deleting Admin'
        ];
    }
}
