<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create() {
        $permissions = Permission::all();
        return view('admin.pages.user-management.addRole', compact('permissions'));
    }

    public function storeRole(Request $req) {
        $validedata = $req->validate([
           'name' => 'required|unique:roles,name',
           'permissions' => 'array|required'
        ]);

        $role = Role::create(['name' => $validedata['name']]);
        $role->givePermissionTo($validedata['permissions']);

        return redirect()->route('view-role')->with('success' , 'Congratulations Your Role Created Successfully!');
    }

    public function viewRole() {
        $roles = Role::all();
        return view('admin.pages.user-management.role', compact('roles'));
    }

    public function deleteRole($id) {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('view-role')->with('delete' , 'Oops Your Role Deleted Successfully!');
    }

    public function editRole(Request $req, $id) {
        $role = Role::findorFail($id);
        $permissions = $role->permissions;
        $allpermissions = Permission::all();
        return view('admin.pages.user-management.editRole', compact('role', 'permissions', 'allpermissions'));
    }

    public function updateRole(Request $req , $id) {
        $validaterole = $req->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'array|required'
        ]);
        $role = Role::findorFail($id);
        $role->name = $validaterole['name'];
        $role->save();

        $role->syncPermissions($validaterole['permissions']);
        return redirect()->route('view-role')->with('success' , 'Congratulations Your Role updated Successfully!');
    }

    public function viewPermission($id) {
        $role = Role::findorFail($id);
        $permissions = $role->permissions;
        return view('admin.pages.user-management.viewRole', compact('role' , 'permissions'));
    }



   
}
