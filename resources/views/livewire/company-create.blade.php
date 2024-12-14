<div>


    @if ($showForm)
    <div class="flex items-center justify-center min-h-screen overflow-hidden fixed inset-0 z-50 bg-black bg-opacity-50">
            <!-- Formulário de Cadastro -->
            <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg fixed">
                <!-- Título do Formulário -->
                <h3 class="text-3xl font-semibold text-gray-700 mb-6 text-center">Cadastrar Nova Empresa</h3>

                <!-- Botão de Fechar -->
                <button wire:click="$set('showForm', false)"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Formulário -->
                <form wire:submit.prevent="createCompany">
                    <!-- Nome da Empresa -->
                    <div class="mb-6">
                        <label for="companyName" class="block text-sm font-medium text-gray-700">Nome da Empresa</label>
                        <input type="text" wire:model="companyName" id="companyName"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required />
                        @error('companyName')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Indústria -->
                    <div class="mb-6">
                        <label for="industry" class="block text-sm font-medium text-gray-700">Indústria</label>
                        <input type="text" wire:model="industry" id="industry"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('industry')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botão de Cadastro -->
                    <button type="submit"
                        class="w-full bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
        @endif
</div>

{{-- Script de notificação --}}
<script>
    window.addEventListener('notification', (event) => {
        let data = event.detail;
        Swal.fire({
            position: data.position,
            icon: data.type,
            title: data.title,
            showConfirmButton: false,
            timer: 2000
        });
    });
</script>
