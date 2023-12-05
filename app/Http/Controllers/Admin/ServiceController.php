<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function createService() {
        $services = Service::all();
        return view('admin.pages.services.create_service', compact('services'));
    }
    public function storeService(Request $req) {
        $service = $req->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('/public/service/' .$imageName);
        }
        $service = New Service;
        $service->title = $req['title'];
        $service->description = $req['description'];
        $service->image = $imageName;
        $service->save();
        return redirect()->route('create-service')->with('success' , 'Your Services Created Successfully!');
    }

    public function editService(Request $req, $id) {
        $service = Service::findorFail($id);
        return view('admin.pages.services.edit-service', compact('service'));
    }

    public function updateService(Request $req, $id) {
        $service = $req->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:4048',
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('/public/service/' . $imageName);
        }

        $service = Service::findorFail($id);
        $service->title = $req['title'];
        $service->description = $req['description'];
        $service->image = $imageName;
        $service->save();
        return redirect()->route('create-service')->with('success' , 'Your Services Created Successfully!');
    }
    public function deleteService(Request $req, $id) {
        $service = Service::findorFail($id);
        $service->delete();
        return redirect()->route('create-service')->with('delete' , 'your data deleted Successfully!');
    }
}
