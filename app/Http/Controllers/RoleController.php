<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Entrust;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){
        $roles = Role::get();
        return view('roles.index',compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
//        dd($permissions);
        $count = count($permissions);
        $count = $count/5;
        return view('roles.create',compact('permissions','count'));
    }

    public function store(Request $request){
        $data = $request->all();
        $this->validate($request,array(
            'name' => 'required|unique:roles',
            'display_name' => 'required'
        ));

        $new_role = New Role();
        $new_role->name         = $data['name'];
        $new_role->display_name = $data['display_name'];
        $new_role->description  = $data['description']; // optional
        $new_role->save();

        $permissionlist = [];
        $perm = $data['roles'];
        foreach ($perm as $key => $value){
            $p = Permission::where('id',$value)->first();
            array_push($permissionlist, $p);
        }

        foreach ($permissionlist as $list) {
            $new_role->attachPermission($list->id);
        }


        toastr()->success('New role with the selected permission is successfully created');
        return redirect()->route('roles.index');
    }

    public function edit($id){
        $data = Role::where('id',$id)->first();
        $permissions = Permission::all();
        $count = count($permissions);
        $count = $count/5;
        $role_perms = DB::table('permission_role')->where('role_id',$id)->get();
        $perms = [];
        foreach ($role_perms as $key => $value){
            array_push($perms, $value->permission_id);
        }
        return view('roles.edit',compact('data','permissions','count','perms'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $this->validate($request,array(
            'name' => 'required',
            'display_name' => 'required'
        ));

        $role = Role::findOrFail($id);
        $edit_role['name']        = $data['name'];
        $edit_role['display_name'] = $data['display_name'];
        $edit_role['description']  = $data['description'];
        $role->update($edit_role);

        $permissionlist = [];
        $perm = $data['roles'];
        foreach ($perm as $key => $value){
            $p = Permission::where('id',$value)->first();
            array_push($permissionlist, $p);
        }
        $role->perms()->sync([]);
        foreach ($permissionlist as $list) {
            $role->attachPermission($list->id);
        }

        toastr()->success('Successfully updated role with the selected permission.');
        return redirect()->route('roles.index');
    }


    public function destroy($id){
        $if_allocated_role = DB::table('role_user')->where('role_id',$id)->first();
        if(empty($if_allocated_role)){
            Role::whereId($id)->delete();
            toastr()->success('Successfully deleted role.');
        }else{
            toastr()->info('This role is currently assigned to some users please edit the user information before this role can be deleted.');
        }

        return redirect()->route('roles.index');
    }
}
