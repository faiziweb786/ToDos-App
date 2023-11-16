<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousal;
use App\Models\Slider;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;

class CarousalController extends Controller
{
    public function create() {
        $carousals = Carousal::all();
        return view('admin.pages.carousal.create-carousal' , compact('carousals'));
    }

    public function storeCarousal(Request $req) {
        $carousal = $req->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'
        ]);
        $imageName = null;
        if($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('public/carousal', $imageName);
        }

        $carousal = new Carousal;
        $carousal->title = $req['title'];
        $carousal->description = $req['description'];
        $carousal->image = $imageName;
        if (!is_null($imageName)) {
            $carousal->save();
            return redirect()->route('carousal-create')->with('success' , 'Image Uploaded Successfully');
        } else {
            return redirect()->route('carousal-create')->with('error' , 'Image Upload Failed');
        }
    }

    public function deleteCarousal(Request $req, $id) {
        $data = Carousal::findorFail($id);
        $filename = $carousal->image;
        $path = '/public/carousal' . $filename ;
        if (Storage::exist($path)) {
            Storage::delete($path);
            $data->delete();
            return redirect()->route('carousal-create')->with('delete' , 'Your image Deleted Successfully');
        }
        return redirect()->route('carousal-create')->with('error', 'File not found');
    }

    public function editCarousal(Request $req, $id) {
        $carousal = Carousal::find($id);
        return view('admin.pages.carousal.edit-carousal' , compact('carousal'));
    }

    public function updateCarousal(Request $req, $id) {
        $carousal = Carousal::findorFail($id);
        $carousalData = $req->validate([
            'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'
        ]);

        $carousal->title = $req['title'];
        $carousal->description = $req['description'];
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' .$image->getClientOriginalExtension();
            $image->storeAs('public/carousal' , $imageName);
            $carousal->image = $imageName;
            $carousal->save();
        }
        return redirect()->route('carousal-create')->with('success', 'Your Image Updated Successfully');
    }



    public function createSlide() {
        $sliders = Slider::all();
        $slides = Slide::all();
        return view('admin.pages.carousal.slides', compact('sliders' , 'slides'));
    }

    public function storeSlide(Request $req) {
        $slide = $req->validate([
            'slider_id' => 'required',
            'title' => 'required',
            'text' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' .$image->getClientOriginalExtension();
            $image->storeAs('public/slide' , $imageName);
        }
        $slide = new Slide;
        $slide->slider_id = $req['slider_id'];
        $slide->title = $req['title'];
        $slide->text = $req['text'];
        $slide->link = $req['link'];
        $slide->image = $imageName;
        $slide->save();
        return redirect()->route('create-slide')->with('success', 'Your Slide Created Successfully!');

    }

    public function deleteSlide(Request $req, $slide_id) {
        $slide = Slide::findorFail($slide_id);
        $filename = $slide->image;
        $path = '/public/slide/' .$filename;
        if (Storage::exists($path)) {
            Storage::delete($path);
            $slide->delete();
            return redirect()->route('create-slide')->with('delete' , 'Your Slide Delete Successfully!');
        }
        return redirect()->route('carousal-create')->with('error', 'File not found');
    }

    public function editSlide(Request $req , $id) {
        $slide = Slide::findorFail($id);
        $sliders = Slider::all();
        return view('admin.pages.carousal.edit-slides', compact('slide' , 'sliders'));
    }

    public function updateSlide(Request $req , $id) {
        $slide = $req->validate([
            'slider_id' => 'required',
            'title' => 'required',
            'text' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);
    
        $slide = Slide::findorFail($id);
        $slide->slider_id = $req['slider_id'];
        $slide->title = $req['title'];
        $slide->text = $req['text'];
        $slide->link = $req['link'];
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' .$image->getClientOriginalExtension();
            $image->storeAs('/public/slide' , $imageName);
        }
        $slide->image = $imageName;
        $slide->save();
        return redirect()->route('create-slide')->with('success' , 'Your Slide Updated Successfully');
    }

    public function createSlider() {
        $sliders = Slider::all();
        return view('admin.pages.carousal.slider', compact('sliders'));
    }

    public function storeSlider(Request $req) {
        $slider = $req->validate([
            'title' => 'required',
            'identifier' => 'required',
            'arrow' => 'required',
            'dots' => 'required',
            'status' => 'required',
        ]);

        $slider = new Slider;
        $slider->title = $req['title'];
        $slider->identifier = $req['identifier'];
        $slider->arrow = $req['arrow'];
        $slider->dots = $req['dots'];
        $slider->status = $req['status'];
        $slider->save();
        return redirect()->route('create-slider')->with('success' , 'Your Slider Created Successfully!');
    }

    public function deleteSlider(Request $req, $slider_id) {
        $slider = Slider::findorFail($slider_id);
        if (!$slider) {
            return view(404);
        }
        $slider->delete();
        return redirect()->route('create-slider')->with('delete' , 'Your slider Deleted sucessfully!');
    }

    public function editSlider(Request $req, $slider_id) {
        $slider = Slider::findorFail($slider_id);
        return view('admin.pages.carousal.edit-slider', compact('slider'));
    }

    public function updateSlider(Request $req, $slider_id) {
        $slider = $req->validate([
            'title' => 'required',
            'identifier' => 'required',
            'arrow' => 'required',
            'dots' => 'required',
            'status' => 'required',
        ]);
        $slider = Slider::findorFail($slider_id);
        $slider->title = $req['title'];
        $slider->identifier = $req['identifier'];
        $slider->arrow = $req['arrow'];
        $slider->dots = $req['dots'];
        $slider->status = $req['status'];
        $slider->save();
        return redirect()->route('create-slider')->with('success', 'Your Slider Updated Successfully!');
    }
    

}
