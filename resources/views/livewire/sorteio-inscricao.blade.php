<div>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Inscrição para o Sorteio do Dia das Mulheres</h2>

    @if (session()->has('success'))
        <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="inscrever">
        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-medium">Nome Completo</label>
            <input type="text" id="nome" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" wire:model="nome">
            @error('nome') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" id="termos" class="w-4 h-4 text-blue-500 focus:ring-2 focus:ring-blue-500 border rounded" wire:model="aceita_termos">
            <label class="ml-2 text-gray-700" for="termos">
                Eu aceito os <a href="#" class="text-blue-600 hover:underline" wire:click.prevent="abrirModal">termos e condições</a>
            </label>
        </div>
        @error('aceita_termos') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition">Inscrever</button>
    </form>

    {{-- Modal de Termos --}}
    @if ($modalAberto)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center" wire:keydown.escape="fecharModal">
            <div class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg">
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h5 class="text-lg font-semibold">Termos e Condições</h5>
                    <button type="button" class="text-gray-500 hover:text-gray-800" wire:click="fecharModal">&times;</button>
                </div>
                <div class="mb-4 text-gray-700">
                    <p>Estes são os termos e condições do sorteio...</p>
                </div>
                <div class="text-right">
                    <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition" wire:click="fecharModal">Fechar</button>
                </div>
            </div>
        </div>
    @endif
</div>
