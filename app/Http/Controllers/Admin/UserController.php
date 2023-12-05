<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function addUser(){
        $roles = Role::all();
        return view('admin.pages.user-management.adduser', compact('roles'));
    }

    public function storeUser(Request $req) {
        $req->validate([
            'name' => 'required',
            'is_admin' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $req['name'];
        $user->is_admin = 1;
        if ($req['is_admin'] == 'customer') {
           
            $user->is_admin = 0;
        }
        $user->email = $req['email'];
        $user->password = $req['password'];
       
        $user->save();
        if ($req['is_admin'] !== 'customer') {
           
            $user->assignRole($req['is_admin']);
        }
        return redirect()->route('viewusers')->with('success' , 'Congratulations! your User added successfully');
    }

    
    public function viewUsers() {
        $users = User::all();
        $data = compact('users');
        return view('admin.pages.user-management.users')->with($data);
    }

    public function deleteUser($id) {
        $user = User::find($id);
        if(!$user)
        {
            return redirect()->route('viewusers')->with('error' , 'does not data exist');
        }
        if($user) {
            $user->delete();
            return redirect()->route('viewusers')->with('error' , 'Oops! your data deleted successfully');
        }
        else{
            return "something want wrong";
        }
    }


    public function editUsers($id) {
        $user = User::find($id);
        $roles = Role::all();
        $data = compact('user','roles');
        return view('admin.pages.user-management.edituser')->with($data);
    }

    public function updateUser(Request $req, $id) {
        $req->validate([
            'name' => 'required',
            'is_admin' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('viewusers')->with('error' , 'Data does not exist!');
        }
        if ($user) {
            $user->name = $req['name'];
            $user->is_admin = 1;
            if ($req['is_admin'] == 'customer') {
                $user->is_Admin = 0;
            }
            $user->email = $req['email'];
            $user->password = $req['password'];
            $user->save();
            if ($req['is_admin'] != 'customer') {
                $user->assignRole($req['is_admin']);
            }
            return redirect()->route('viewusers')->with('success' , 'Congratulations! User updated Successfully');
        }
        else{
            return view(404);
        }

    }

}
