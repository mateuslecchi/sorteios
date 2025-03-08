<div class="container mt-5">
    <h2>Inscrição para o Sorteio do Dia das Mulheres</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="inscrever">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" wire:model="nome">
            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="termos" class="form-check-input" wire:model="aceita_termos">
            <label class="form-check-label" for="termos">
                Eu aceito os <a href="#" wire:click.prevent="abrirModal">termos e condições</a>
            </label>
            @error('aceita_termos') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Inscrever</button>
    </form>

    {{-- Modal de Termos --}}
    @if ($modalAberto)
        <div class="modal fade show d-block" style="background: rgba(0,0,0,0.5);" wire:keydown.escape="fecharModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Termos e Condições</h5>
                        <button type="button" class="btn-close" wire:click="fecharModal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Estes são os termos e condições do sorteio...</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" wire:click="fecharModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
