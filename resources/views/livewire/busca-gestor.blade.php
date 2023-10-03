<div>
    <input type="text" wire:model="searchValue" placeholder="Buscar um diretor...">
    
    <!-- Exibir resultados da pesquisa aqui -->
    <ul>
        @foreach ($gestores as $gestor)
            <li wire:click="selecionargestor('{{ $gestor->matricula }}')">{{ $gestor->nome }}</li>
        @endforeach
    </ul>
</div>
