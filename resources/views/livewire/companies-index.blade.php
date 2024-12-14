<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col justify-center items-center space-y-6">
        {{-- Não possui empresas --}}
        @if ($companies->isEmpty())
            <div class="w-full h-64 flex flex-col items-center justify-center">
                @if($showForm == false)
                <!-- Texto -->
                <h1 class="text-lg font-semibold text-white mb-6">Nenhuma empresa encontrada</h1>
                @endif

                <!-- Formulário de Cadastro -->
                <div class="w-1/3">
                    @if ($showForm)
                        <div class="relative bg-white p-8 rounded-lg shadow-lg">
                            <!-- Botão para Fechar -->
                            <button wire:click="toggleForm"
                                class="absolute top-4 right-4 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Título do Formulário -->
                            <h3 class="text-lg font-semibold text-gray-700 mb-6 text-center">Cadastrar Nova Empresa</h3>

                            <!-- Formulário -->
                            <form wire:submit.prevent="createCompany">
                                <div class="mb-4">
                                    <label for="companyName" class="block text-sm font-medium text-gray-700">Nome da
                                        Empresa</label>
                                    <input type="text" wire:model="companyName" id="companyName"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required />
                                    @error('companyName')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="industry"
                                        class="block text-sm font-medium text-gray-700">Indústria</label>
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
                    @else
                        <div class="flex justify-center">
                            <button wire:click="toggleForm"
                                class="mt-4 bg-blue-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-600 transition duration-200">
                                Cadastrar Nova Empresa
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        @else
        <div class="flex space-x-6">
            <!-- Lista de Empresas -->
            <div class="w-2/3 bg-white shadow-lg rounded-lg overflow-hidden">
                <h3 class="text-lg font-semibold text-gray-700 px-6 py-4">Minhas Empresas</h3>

                <!-- Tabela de Empresas -->
                <table class="min-w-full text-left table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase">Nome da Empresa</th>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase">Indústria</th>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $company->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $company->industry }}</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <!-- Botão para Entrar -->
                                    <button wire:click="selectCompany('{{ $company->id }}')"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-5 h-5 inline-block">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Entrar
                                    </button>

                                    <!-- Botão para Excluir -->
                                    <button wire:click="deleteCompany('{{ $company->id }}')"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-5 h-5 inline-block">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Confirmação de Exclusão -->
                @if ($confirmDelete)
                    <div class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Tem certeza que deseja excluir esta empresa?</h3>
                            <div class="flex justify-around">
                                <button wire:click="deleteConfirmed"
                                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none">
                                    Sim, Excluir
                                </button>
                                <button wire:click="deleteCanceled"
                                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Paginação -->
                <div class="mt-4">
                    <div class="flex justify-center">
                        {{ $companies->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>

            <!-- Formulário de Cadastro -->
            <div class="w-1/3">
                @if ($showForm)
                    <div class="relative bg-white p-8 rounded-lg shadow-lg">
                        <!-- Botão para Fechar -->
                        <button wire:click="toggleForm"
                            class="absolute top-4 right-4 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Título do Formulário -->
                        <h3 class="text-lg font-semibold text-gray-700 mb-6 text-center">Cadastrar Nova Empresa</h3>

                        <!-- Formulário -->
                        <form wire:submit.prevent="createCompany">
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
                @else
                    <div class="flex justify-center">
                        <button wire:click="toggleForm"
                            class="mt-4 bg-blue-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-600 transition duration-200">
                            Cadastrar Nova Empresa
                        </button>
                    </div>
                @endif
            </div>
        </div>

        @endif
    </div>

    {{-- Script criação de empresa --}}
    <script>
        window.addEventListener('notification', (event) => {
            let data = event.detail;
            Swal.fire({
                position: data.position,
                icon: data.type,
                title: data.title,
                showConfirmButtom: false,
                timer: 2000
            })
        });
    </script>
</div>
