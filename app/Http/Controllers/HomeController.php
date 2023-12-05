<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousal;
use App\Models\User;
use App\Models\Slide;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousals = Carousal::all();
        $users = User::all();
        $pageidentifier = Slider::where('slug', 'slider3')->first();
        $identifier = $pageidentifier ? $pageidentifier->identifier : null;
        $sliders = Slider::with('slides')->get();
        return view('user.home', compact('carousals' , 'users', 'sliders' , 'identifier'));
    }



}
