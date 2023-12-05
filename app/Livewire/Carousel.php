<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carousal;
use App\Models\Slider;


class Carousel extends Component
{

    public $sliders;

    public function mount($identifier)
{
    $this->sliders = Slider::where('identifier' , $identifier)->get();
}
    public function render()
    {
        return view('livewire.carousel');
    }
}
