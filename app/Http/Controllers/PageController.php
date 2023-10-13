<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class PageController extends Controller
{
    // public function addItem(){
    //     return view('additem');
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeData(Request $req){
        $req->validate([
            'name' => 'required',
            
            'email' =>'required|email',
            'cnic' => 'required|numeric',
            'pnumber' => 'required|numeric',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'religion' => 'required',
            'address' => 'required',
        ]);

        $item = new Item;
        $item->name = $req['name'];
        $item->user_id = auth()->user()->id;
        $item->email = $req['email'];
        $item->cnic = $req['cnic'];
        $item->pnumber = $req['pnumber'];
        $item->gender = $req['gender'];
        $item->dob = $req['dob'];
        $item->country = $req['country'];
        $item->religion = $req['religion'];
        $item->address = $req['address'];
        $item->save();
        return response()->json([
            'success' => 'Congratulations! your Data Inserted Successfully',
            'item' => $item]);

    }
    
    public function viewData()
    {
        $user = auth()->user(); 
        
        // $items = $user->items;
         $items = Item::where('user_id' , $user->id)->get(); 
        $data = compact('items');
        return view('items')->with($data);
    }


    
    public function deleteEntry($id) {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['error' => 'Item not found']);
        }
        $user = auth()->user();
        if ($item->user_id == $user->id) {
            $item->delete();
            return response()->json(['success' => 'Oops Your Item is deleted']);
        } else {
            return response()->json(['error' => 'You are not authorized to delete this item']);
        }
    }
    
    

    public function editData($id){
        $data = Item::find($id);
        if (empty($data)) {
            return redirect()->route('viewdata');
        }
        $item = compact('data');
        return view('items')->with($item);
        // return response()->json([
        //     'success' => 'GoTo Next',
        //     'item' => $item
        // ]);
    }

    public function updateData(Request $req , $id){
        $req->validate([
            'name' => 'required',
            'email' =>'required | email',
            'cnic' => 'required|numeric',
            'pnumber' => 'required|min:11 | numeric',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'religion' => 'required',
            'address' => 'required',
        ]);
        $userid =  auth()->user()->id;
        $data = Item::find($id);

        if($data->user_id == $userid)
                    {
        $data->name = $req['name'];
        $data->email = $req['email'];
        $data->cnic = $req['cnic'];
        $data->pnumber = $req['pnumber'];
        $data->gender = $req['gender'];
        $data->dob = $req['dob'];
        $data->country = $req['country'];
        $data->religion = $req['religion'];
        $data->address = $req['address'];
        $data->save();
        return response()->json([
            'success' => 'Congratulations! your Data updated Successfully',
            'item' => $data]);
        }
        else{
            return response()->json(['error' => 'You are not authorized to edit this item']);
        }

    }
}
