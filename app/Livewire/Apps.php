<?php


namespace App\Livewire;

use Livewire\Component;


class Apps extends Component
{
    public function render()
    {
        $apps = \App\Models\Intranet\Admin\Apps::all(); // Use the fully qualified class name here
        return view('livewire.apps', ['apps' => $apps]);
    }
}



