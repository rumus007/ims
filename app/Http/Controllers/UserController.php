<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    /**
     * Redirects to index page of users
     *
     */
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create(){
        $loggedInUser = Auth::user()->hasRole('Admin');
        if($loggedInUser){
            $roles = Role::all();
//        dd($roles);
            return view('users.create',compact('roles'));
        }else{
            toastr()->info('You are not authorized to create users');
            return redirect()->back();
        }

    }

    public function store(Request $request){
        $data = $request->all();
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ));
        $loggedInUser = Auth::user()->hasRole('Admin');
        if($loggedInUser){
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $roleslist = [];
            $roleid = $data['roles'];
            foreach ($roleid as $key => $value){
                $r = Role::where('id',$value)->first();
                array_push($roleslist, $r);
            }
            foreach ($roleslist as $list){
                $user->attachRole($list->id);
            }

            toastr()->success('New User with the selected role is successfully created');
        }else{
            toastr()->info('You are not authorized to add new users');
        }


        return redirect()->route('users.index');


    }

    public function edit($id){
        $loggedInUser = Auth::user()->hasRole('Admin');
        if($loggedInUser){
            $user = User::where('id',$id)->first();
            $roles = Role::all();
            $allocated_role = [];
            foreach ($roles as $role){
                if($user->hasRole($role['name'])){
                    array_push($allocated_role,$role);
                }
            }
            return view('users.edit',compact('user','roles','allocated_role'));
        }else{
            toastr()->info("You are not authorized to edit user information");
            return redirect()->back();
        }

    }


    public function update(Request $request, $id){
        $data = $request->all();
        $loggedInUser = Auth::user();
        $checkAdmin = Auth::user()->hasRole('Admin');
        $user_pword = Hash::check($data['user_password'], $loggedInUser['password']);
        if($checkAdmin){
            if($user_pword){
                $edit = User::findOrFail($id);
                $updated['name'] = $data['name'];
                $updated['email'] = $data['email'];
                $updated['password'] = Hash::make($data['password']);
                $edit->update($updated);

                $roleslist = [];
                $roleid = $data['roles'];
                foreach ($roleid as $key => $value){
                    $r = Role::where('id',$value)->first();
                    array_push($roleslist, $r);
                }
                foreach ($roleslist as $list){
                    $edit->roles()->sync($list->id);
                }
                toastr()->success("User information updated successfully");
                return redirect()->route('users.index');

            }else{
                toastr()->info('Invalid Password for Logged In User');
                return redirect()->back();
            }
        }else{
            toastr()->info('You are not authorized to edit user information');
            return redirect()->route('users.index');
        }
    }

    public function destroy($id){
        $checkAdmin = Auth::user()->hasRole('Admin');
        if($checkAdmin){
            $user = User::findOrFail($id);
            $checkUser = $user->hasRole('Admin');
            if($checkUser){


                toastr()->warning('The user you are trying to delete has Admin privilege please change the role in order to delete');
                return redirect()->back();
            }else{
                $loggedInUser = Auth::user()->id;
                if($loggedInUser == $id){
                    toastr()->warning('You cannot delete yourself');
                    return redirect()->back();
                }else{
                    $user->delete();
                    toastr()->success('User has been successfully deleted');
                    return redirect()->back();
                }
            }

        }else{
            toastr()->warning('You are not authorized to delete users');
        }
    }
}
