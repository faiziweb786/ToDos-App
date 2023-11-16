<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    public function addItem() {
        $users = User::all();
        $user = compact('users'); 
        return view('admin.pages.products.additem')->with($user);
    }
    public function storeItem(Request $req) {
        $req->validate([
            'name' => 'required',
            'user_id' => 'required',
            'email' => 'required',
            'cnic' => 'required',
            'pnumber' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'religion' => 'required',
            'address' => 'required',
        ]);
        
        $item = new Item;
        $item->name = $req['name'];
        $item->user_id = $req['user_id'];
        if( $req['user_id'] =='test') {
            $item->user_id = 9;
        }
        $item->email = $req['email'];
        $item->cnic = $req['cnic'];
        $item->pnumber = $req['pnumber'];
        $item->gender = $req['gender'];
        $item->dob = $req['dob'];
        $item->country = $req['country'];
        $item->religion = $req['religion'];
        $item->address = $req['address'];
        $item->save();
        return redirect()->route('useritem')->with('success' , 'Congratulations! Your data inserted successfully');
    }

    public function userItems() {
        $items = Item::all();
        $items = Item::paginate(15);
        $users = User::all();
        $data = compact('items' , 'users');
        return view('admin.pages.products.user-items')->with($data);
    }

    public function deleteItems($id) {
        $item = Item::find($id);
        if(!$item){
            return view(404);
        }
        else {
            $item->delete();
            return redirect()->route('useritem')->with('error' , 'Oops Your Item Deleted successfully');
        }
    }

    public function editItems(Request $req, $id) {
        $users = User::all();
        $item = Item::find($id);
        if(!$item)
        {
            return redirect()->route('login');
        }
        else{
            $data = compact('item', 'users');
            return view('admin.pages.products.edit')->with($data);
        }
    }

    public function updateItems(Request $req , $id) {
        $req->validate([
            'name' => 'required',
            'user_id' => 'required', 
            'email' => 'required', 
            'cnic' => 'required', 
            'pnumber' => 'required', 
            'gender' => 'required', 
            'dob' => 'required', 
            'country' => 'required', 
            'religion' => 'required', 
            'address' => 'required', 
        ]);

        $item = Item::find($id);
        if(!$item)
        {
            return redirect()->route('login');
        }
        else {
            $item->name = $req['name'];
            $item->user_id = $req['user_id'];
            $item->email = $req['email'];
            $item->cnic = $req['cnic'];
            $item->pnumber = $req['pnumber'];
            $item->gender = $req['gender'];
            $item->dob = $req['dob'];
            $item->country = $req['country'];
            $item->religion = $req['religion'];
            $item->address = $req['address'];
            $item->save();
            return redirect()->route('useritem')->with('success', 'Congratulations! your data updated successfully');
        }
    }
}
