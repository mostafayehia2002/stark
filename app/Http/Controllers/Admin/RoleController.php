<?php

namespace App\Http\Controllers\Admin;
use App\Services\RoleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{

    public function index(Request $request): View
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('dashboard.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $permission = Permission::get();
        return view('dashboard.roles.create',compact('permission'));
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate( [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $permissionsID = array_map(
            function($value) { return (int)$value; },
            $request->input('permission')
        );

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionsID);
        toastr()->success('Role created successfully');
        return redirect()->route('admin.roles.index');

    }

    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('dashboard.roles.show',compact('role','rolePermissions'));
    }


    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('dashboard.roles.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $permissionsID = array_map(
            function($value) { return (int)$value; },
            $request->input('permission')
        );
        $role->syncPermissions($permissionsID);
        toastr()->success('Role updated successfully');
        return redirect()->route('admin.roles.index');

    }

    public function destroy($id): RedirectResponse
    {
        DB::table("roles")->where('id',$id)->delete();
       toastr()->success('Role deleted successfully');
        return redirect()->route('admin.roles.index');

    }
}