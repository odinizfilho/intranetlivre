<div class="mb-3">
    <label for="sala_selecionada">Sala</label>
    <select id="sala_selecionada" wire:model="salaSelecionada">
        <option value="">Todas as salas</option>
        @foreach ($salas as $sala)
            <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
        @endforeach
    </select>
</div>