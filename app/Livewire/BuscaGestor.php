<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class BuscaGestor extends Component
{
    public $searchValue;
    public $selecionargestor;


    public $gestores;

public function mount()
{
    $this->gestores = User::all();
}
    public function render()
    {
        return view('livewire.busca-gestor');
    }

    public function selecionargestor($matricula)
    {
        $this->selecionargestor = $matricula;
    }
}
