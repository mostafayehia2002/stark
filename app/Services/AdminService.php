<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

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
        if($user){
            return [
                'success'=>true,
                'user'=>$user
            ];
        }
        return[
            'success'=>false,
            'message'=>'Admin Not Found'
        ];

    }
    public function update(Request $request ,$id): array{

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
