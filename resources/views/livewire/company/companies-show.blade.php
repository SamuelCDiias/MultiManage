<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col justify-center items-center space-y-6">

        {{-- Se não houver empresas --}}
        @if ($companies->isEmpty())
            <!-- Botão Criar Empresa -->
            <button type="bottom" wire:click="createCompany"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 transform hover:scale-105 shadow-md">
                Criar Empresa
            </button>
        @else
            <div class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 border-b bg-gray-50">
                    <!-- Título -->
                    <h3 class="text-2xl font-semibold text-gray-800">Minhas Empresas</h3>

                    <!-- Botão Criar Empresa -->
                    <button type="bottom" wire:click="createCompany"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 transform hover:scale-105 shadow-md">
                        Criar Empresa
                    </button>
                </div>

                <!-- Tabela de Empresas -->
                <table class="min-w-full text-left table-auto">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="px-6 py-3 text-sm font-semibold">Nome da Empresa</th>
                            <th class="px-6 py-3 text-sm font-semibold">Indústria</th>
                            <th class="px-6 py-3 text-sm font-semibold text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="border-b hover:bg-gray-50 transition duration-200">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $company->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $company->industry }}</td>
                                <td class="px-6 py-4 text-center space-x-4">
                                    <!-- Botão para Entrar -->
                                    <button wire:click="selectCompany('{{ $company->id }}')"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200 transform hover:scale-105">
                                        Entrar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginação -->
                <div class="mt-6 px-6 py-4">
                    <div class="flex justify-center">
                        {{ $companies->links('pagination::tailwind') }}
                    </div>
                </div>

            </div>
        @endif

        <livewire:company.company-create />

    </div>
</div>
