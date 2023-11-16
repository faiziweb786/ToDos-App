<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favicon;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function profile(Request $req, $id) {
        $user = User::findOrFail($id);
        $randomNumber = random_int(100000, 999999);
        $randomnbr = random_int(100000, 999999);
        return view('admin.pages.profile' , compact('randomNumber' , 'randomnbr' , 'user'));
    }

    public function updateProfile(Request $req, $id) {
        $profile = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'pnumber' => 'required',
            'education' => 'required',
            'skill' => 'required',
            'address' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'
        ]);
        $user = User::findOrFail($id);
        $user->name = $req['name']; 
        $user->email = $req['email']; 
        $user->pnumber = $req['pnumber']; 
        $user->education = $req['education']; 
        $user->skill = $req['skill']; 
        $user->address = $req['address']; 
        if ($req->hasFile('profile_image')) {
            $image = $req->file('profile_image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('public' , $imageName);
            auth()->user()->update(['profile_image' => $imageName]);
        }
        return redirect()->route('profile', $id)->with('success' , 'Your Profile Updated Successfully!');
    }


    public function favIcon() {
        $favicons = Favicon::all();
        return view('admin.pages.favicon.icon' , compact('favicons'));
    }

    public function addFavicon(Request $req) {
        $favicon = $req->validate([
            'favicon' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'
        ]);

        $existingFavicon = Favicon::first();

        // If a favicon exists, delete it
        if ($existingFavicon) {
            Storage::delete('public/favicon/' . $existingFavicon->favicon);
            $existingFavicon->delete();
        }
        $favicon = new Favicon;
        if ($req->hasFile('favicon')) {
            $image = $req->file('favicon');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('public/favicon' , $imageName);
            $favicon->favicon = $imageName;
            $favicon->save();
        }
        return redirect()->route('favicon')->with('success' , 'Congratulations! your Favicon oploaded successfully');
    }

    public function delFavicon(Request $req, $id) {
        $favicon = Favicon::findorFail($id);
        $filename = $favicon->favicon;
        $path = 'public/favicon/' . $filename;
        if (Storage::exists($path)) {
            Storage::delete($path);
            $favicon->delete();
            return redirect()->route('favicon')->with('delete', 'Oops! Your icon deleted successfully');
        }
    
        return redirect()->route('favicon')->with('error', 'File not found');
    }
    

    public function editFavicon(Request $req, $id) {
        $favicon = Favicon::findorFail($id);
        return view('admin.pages.favicon.edit', compact('favicon'));
    }

    public function updateFavicon(Request $req, $id) {
        $favicon = Favicon::findOrFail($id);
    
        $validatedData = $req->validate([
            'favicon' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'
        ]);
    
        if ($req->hasFile('favicon')) {
            $image = $req->file('favicon');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('public/favicon/', $imageName);
    
            // Update the 'favicon' attribute of the model
            $favicon->update(['favicon' => $imageName]);
        }
    
        return redirect()->route('favicon')->with('success', 'Your icon updated successfully');
    }

}
