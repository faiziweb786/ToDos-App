<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function teamCreate() {
        $teams = Team::all();
        return view('admin.pages.team.create-team', compact('teams'));
    }
    public function teamStore(Request $req) {
        $team = $req->validate([
            'title' => 'required',
            'service' => 'required',
            'description' => 'required|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            'fb_link' => 'required',
            'twitter_link' => 'required',
            'google_link' => 'required',
            'pintrest_link' => 'required'
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('/public/team/' .$imageName);
        }
        $team = New Team;
        $team->title = $req['title'];
        $team->service = $req['service'];
        $team->description = $req['description'];
        $team->image = $imageName;
        $team->fb_link = $req['fb_link'];
        $team->twitter_link = $req['twitter_link'];
        $team->google_link = $req['google_link'];
        $team->pintrest_link = $req['pintrest_link'];
        $team->save();
        return redirect()->route('create-team')->with('success' , 'Your Services Created Successfully!');
    }

    public function teamEdit(Request $req, $id) {
        $team = Team::findorFail($id);
        return view('admin.pages.team.edit-team', compact('team'));
    }

    public function teamUpdate(Request $req, $id) {
        $team = $req->validate([
            'title' => 'required',
            'service' => 'required',
            'description' => 'required|max:90',
            'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:4048',
            'fb_link' => 'required',
            'twitter_link' => 'required',
            'google_link' => 'required',
            'pintrest_link' => 'required'
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('/public/team/' . $imageName);
        }

        $team = Team::findorFail($id);
        $team->title = $req['title'];
        $team->service = $req['service'];
        $team->description = $req['description'];
        $team->image = $imageName;
        $team->fb_link = $req['fb_link'];
        $team->twitter_link = $req['twitter_link'];
        $team->google_link = $req['google_link'];
        $team->pintrest_link = $req['pintrest_link'];
        $team->save();
        return redirect()->route('create-team')->with('success' , 'Your Services Created Successfully!');
    }
    public function teamDelete(Request $req, $id) {
        $team = Team::findorFail($id);
        $team->delete();
        return redirect()->route('create-team')->with('delete' , 'your data deleted Successfully!');
    }
}
