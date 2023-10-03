<div>
    <input type="text" wire:model="searchValue" placeholder="Buscar uma unidade...">

    <!-- Exibir resultados da pesquisa aqui -->
    <ul>
        @foreach ($unidades as $unidade)
            <li wire:click="selecionarUnidade('{{ $unidade->cod_unidade }}')">{{ $unidade->nome }}</li>
        @endforeach
    </ul>
</div>
