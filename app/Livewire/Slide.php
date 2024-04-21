<?php

namespace App\Livewire;

use App\Models\Intranet\Slider;
use Livewire\Component;

class Slide extends Component
{
    public function render()
    {
        $slider = Slider::all();

        return view('livewire.slide', compact('slider'));
    }
}
