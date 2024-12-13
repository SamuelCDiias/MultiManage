<div>
    <!-- Botão para Mostrar Formulário -->
    <div class="flex justify-center">
        @if ($showForm)
            <button wire:click="toggleForm"
                class="mt-4 bg-red-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-red-600 transition duration-200">
                Cancelar
            @else
                <button wire:click="toggleForm"
                    class="mt-4 bg-blue-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-600 transition duration-200">
                    Cadastrar Nova Empresa
        @endif
        </button>
    </div>

    <!-- Formulário de Cadastro -->
    @if ($showForm)
        <div class="flex justify-center mt-6">
            <form wire:submit.prevent="submitForm" class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Cadastrar Nova Empresa</h2>

                <div class="mb-4">
                    <label for="companyName" class="block text-sm font-medium text-gray-700">Nome da Empresa</label>
                    <input type="text" wire:model="companyName" id="companyName"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required />
                    @error('companyName')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="industry" class="block text-sm font-medium text-gray-700">Indústria</label>
                    <input type="text" wire:model="industry" id="industry"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('industry')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
                    Cadastrar
                </button>
            </form>
        </div>
    @endif
</div>
