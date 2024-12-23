<div class="max-w-6xl mx-auto p-6">
    <!-- Campo de filtro -->
    <div class="flex justify-between items-center mb-4">
        <input type="text" wire:model.live="nameFilter" placeholder="Filtrar empresa"
            class="px-3 py-2 pr-0 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
    </div>

    <div class="flex flex-col justify-center items-center space-y-6">
        @if ($companies->isEmpty())
            <!-- Mensagem de Nenhuma Empresa Encontrada -->
            <div class="w-full bg-red-50 p-6 border border-red-300 rounded-md text-center text-gray-700">
                <p class="text-lg font-semibold">Nenhuma empresa encontrada.</p>
                <p class="text-sm text-gray-500">Tente outro nome ou crie uma nova empresa.</p>

                <!-- Botão para Criar Empresa -->
                <button type="button" wire:click="createCompany"
                    class="mt-4 bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
                    Criar Empresa
                </button>
            </div>
        @else
            <!-- Lista de Empresas -->
            <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 border-b">
                    <h3 class="text-2xl font-semibold text-gray-800">Minhas Empresas</h3>
                    <button type="button" wire:click="createCompany"
                        class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600">
                        Criar Empresa
                    </button>
                </div>

                <!-- Tabela de Empresas -->
                <table class="min-w-full text-left table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 uppercase">Nome da Empresa</th>
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 uppercase">Indústria</th>
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 uppercase text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="border-b hover:bg-blue-50 transition duration-200 ease-in-out">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $company->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $company->industry }}</td>
                                <td class="px-6 py-4 text-center">
                                    <button wire:click="selectCompany('{{ $company->id }}')"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
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
    </div>

    @livewire('company.company-create')
</div>
