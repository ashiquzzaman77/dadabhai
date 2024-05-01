<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\GroupName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //All Permission
    public function AllPermission()
    {
        $permissions = Permission::orderBy('group_name','ASC')->get();
        $groups = GroupName::orderBy('group_name','ASC')->latest()->get();

        return view('admin.pages.roles.all_permission', compact('permissions','groups'));
    }

    //Store Permission
    public function StorePermission(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        toastr()->success('Permission Inserted Successfully');
        return redirect()->route('all.permission');
    }

    //Edit Permission
    public function EditPermission($id)
    {
        $permissions = Permission::find($id);
        $groups = GroupName::orderBy('group_name','ASC')->latest()->get();

        return view('admin.pages.roles.edit_permission', compact('permissions','groups'));
    }

    //Update Permission
    public function UpdatePermission(Request $request)
    {
        $id = $request->id;

        Permission::find($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        toastr()->success('Permission Update Successfully');

        return redirect()->route('all.permission');
    }

    //Delete Permission
    public function DeletePermission($id)
    {
        Permission::find($id)->delete();

        toastr()->success('Permission Delete Successfully');

        return redirect()->route('all.permission');
    }

    // =============================== Group Name ====================

    //All Permission
    public function AllGroupName()
    {
        $groups = GroupName::orderBy('group_name','ASC')->latest()->get();
        return view('admin.pages.roles.groupname.all_group_name', compact('groups'));
    }

    //Store Permission
    public function StoreGroupName(Request $request)
    {
        GroupName::create([
            'group_name' => strtolower($request->group_name),
        ]);

        toastr()->success('Group Name Inserted Successfully');
        return redirect()->route('all.group.name');
    }

     //Update GroupName
     public function UpdateGroupName(Request $request)
     {
         $id = $request->id;
 
         GroupName::find($id)->update([
             'group_name' => strtolower($request->group_name),
         ]);
 
         toastr()->success('Group Name Update Successfully');
 
         return redirect()->route('all.group.name');
     }

     //Delete Permission
    public function DeleteGroupName($id)
    {
        GroupName::find($id)->delete();

        toastr()->success('Group Name Delete Successfully');

        return redirect()->route('all.group.name');
    }

    // =========================== Role ==============================

    //All Role
    public function AllRole()
    {
        $roles = Role::all();
        return view('admin.pages.roles.role.all_role', compact('roles'));
    }

    //Store Role
    public function StoreRole(Request $request)
    {
        Role::create(['name' => $request->name]);

        toastr()->success('Role Inserted Successfully');

        return redirect()->route('all.role');
    }

    //Edit Role
    // public function EditRole($id)
    // {
    //     $roles = Role::find($id);
    //     return view('admin.pages.roles.role.edit_role', compact('roles'));
    // }

    //Update Role
    public function UpdateRole(Request $request)
    {
        $id = $request->id;

        Role::find($id)->update(['name' => $request->name]);

        toastr()->success('Role Update Successfully');

        return redirect()->route('all.role');
    }

    //Delete Role
    public function DeleteRole($id)
    {
        Role::find($id)->delete();

        toastr()->success('Role Delete Successfully');

        return redirect()->route('all.role');
    }

    ////////////////////// Role In Permission //////////////////////////

    //All Roles Permission
    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('admin.pages.roles.rolesetup.all_roles_permission', compact('roles'));
    }

    //Add Roles Permission
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $permission_groups = Admin::getpermissionGroups();

        return view('admin.pages.roles.rolesetup.add_rolepermission', compact('roles', 'permissions', 'permission_groups'));
    }

    //Role Permission Store
    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        toastr()->success('Role Permission Inserted Successfully');

        return redirect()->back();
    }

    //AdminRolesEdit
    public function AdminRolesEdit($id)
    {

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        $permission_groups = Admin::getpermissionGroups();

        return view('admin.pages.roles.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    }

    //AdminRolesUpdate
    public function AdminRolesUpdate(Request $request, $id)
    {

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        toastr()->success('Role Permission Update Successfully');

        return redirect()->route('all.roles.permission');

    }

    //AdminRolesDelete
    public function AdminRolesDelete($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        toastr()->success('Role Permission Delete Successfully');

        return redirect()->back();

    }

    // ============================ Admin Permission ========================

    //Admin Permission
    public function AdminPermission()
    {
        $users = Admin::get();
        $roles = Role::latest()->get();

        return view('admin.pages.roles.admin.admin_permission', compact('users', 'roles'));
    }

    public function StoreAdminPermission(Request $request)
    {
        $user = new Admin();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->company_name = $request->company_name;
        $user->designation = $request->designation;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = '1';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        toastr()->success('Data Inserted Successfully');

        return redirect()->route('all.admin.permission');

    }

    //Edit Admin Permission
    public function EditAdminPermission($id)
    {
        $users = Admin::findOrFail($id);
        $roles = Role::all();

        return view('admin.pages.roles.admin.edit_admin_permission', compact('users', 'roles'));
    }

    //UpdateAdmin
    public function UpdateAdmin(Request $request, $id)
    {

        $user = Admin::findOrFail($id);
        $user->name = $request->name;

        $user->username = $request->username;
        $user->company_name = $request->company_name;
        $user->designation = $request->designation;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->email = $request->email;
        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        toastr()->success('Data Update Successfully');

        return redirect()->route('all.admin.permission');

    }

    //DeleteAdmin
    public function DeleteAdmin($id)
    {
        $user = Admin::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        toastr()->success('Data Delete Successfully');

        return redirect()->route('all.admin.permission');

    }

    //InactiveAdmin
    public function InactiveAdmin($id)
    {

        Admin::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('Admin Inactive Successfully');

        return redirect()->back();
    }

    //ActiveAdmin
    public function ActiveAdmin($id)
    {

        Admin::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('Admin Active Successfully');

        return redirect()->back();
    }
}
