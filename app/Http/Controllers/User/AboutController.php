<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Livewire\Carousel;
use App\Models\Slider;

class AboutController extends Controller
{
    public function aboutUs()
    {
        $pageidentifier = Slider::where('slug', 'sliderone')->first();
        $identifier = $pageidentifier ? $pageidentifier->identifier : null;
        return view('user.about-us', compact('identifier'));
    }
}
