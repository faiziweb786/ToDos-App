<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Livewire\Carousel;
use App\Models\Team;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Carousal;

class WelcomeController extends Controller
{
    public function welcome() {
        $pageidentifier = Slider::where('slug' , 'slider')->first();
        $identifier = $pageidentifier ? $pageidentifier->identifier : null;
        $teams = Team::all();
        $services = Service::all();
        return view('user.welcome', compact('teams', 'services' , 'identifier'));
    }
}
