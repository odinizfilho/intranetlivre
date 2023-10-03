<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Unidade;

class BuscaUnidade extends Component
{
    public $searchValue;
    public $SelecionarUnidade;
    public $unidadeModel;

    public function mount(Unidade $unidadeModel)
    {
        $this->searchValue = '';
        $this->SelecionarUnidade = '';
        $this->unidadeModel = $unidadeModel;
    }

    public function render()
    {
        $unidades = $this->unidadeModel->all();

        return view('livewire.busca-unidade', [
            'unidades' => $unidades,
        ]);
    }

    public function selecionarUnidade($cod_unidade)
    {
        $this->SelecionarUnidade = $cod_unidade;
    }

    public function salvarUnidade()
{
    $novaUnidade = new Unidade;
    $novaUnidade->nome = $this->nomeDaUnidade; // Substitua pelo nome correto.
    $novaUnidade->save();
    
    // Limpe o campo de pesquisa ou faça outras ações necessárias.
    $this->searchValue = '';
    $this->SelecionarUnidade = $novaUnidade->cod_unidade;
}

}
