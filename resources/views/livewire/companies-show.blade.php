<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col justify-center items-center space-y-6">

        {{-- Não possui empresas --}}
        @if ($companies->isEmpty())
            <!-- Botão Criar Empresa -->
            <button type="bottom" wire:click="createCompany"
                class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
                Criar Empresa
            </button>
        @else
            <div class="flex space-x-6">
                <!-- Lista de Empresas -->
                <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="flex justify-between items-center px-6 py-4 border-b">
                        <!-- Título -->
                        <h3 class="text-2xl font-semibold text-gray-800">Minhas Empresas</h3>

                        <!-- Botão Criar Empresa -->
                        <button type="bottom" wire:click="createCompany"
                            class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
                            Criar Empresa
                        </button>
                    </div>

                    <!-- Tabela de Empresas -->
                    <table class="min-w-full text-left table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-sm font-semibold text-gray-600 uppercase">Nome da Empresa</th>
                                <th class="px-6 py-3 text-sm font-semibold text-gray-600 uppercase">Indústria</th>
                                <th class="px-6 py-3 text-sm font-semibold text-gray-600 uppercase text-center">Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr class="border-b hover:bg-blue-50 transition duration-200 ease-in-out">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $company->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $company->industry }}</td>
                                    <td class="px-6 py-4 text-center space-x-4">
                                        <!-- Botão para Entrar -->
                                        <button wire:click="selectCompany('{{ $company->id }}')"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-5 h-5 inline-block">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7">
                                                </path>
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
                    <livewire:company-delete />
                    <!-- Paginação -->
                    <div class="mt-6 px-6 py-4">
                        <div class="flex justify-center">
                            {{ $companies->links('pagination::tailwind') }}
                        </div>
                    </div>

                </div>
            </div>
            @endif


                <livewire:company-create />



    </div>


</div>
