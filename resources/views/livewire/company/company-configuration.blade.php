<div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
    <!-- Título e Informações da Empresa -->
    <div class="mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">Configurações da Empresa</h2>
        <div class="text-sm text-gray-500 mt-4">
            <p><strong class="text-gray-700">Nome:</strong> {{ $company->name }}</p>
            <p><strong class="text-gray-700">Tipo:</strong> {{ $company->industry }}</p>
            <p><strong class="text-gray-700">CNPJ:</strong> {{ $company->cnpj }}</p>
            <p><strong class="text-gray-700">Data de Criação:</strong> {{ $company->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <!-- Usuários da Empresa -->
    <div class="mb-8">
        <h3 class="text-2xl font-semibold text-gray-700">Usuários Associados</h3>

        <div class="overflow-x-auto mt-4 bg-gray-50 rounded-lg shadow-sm">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Nome</th>
                        <th class="px-6 py-3 text-left">E-mail</th>
                        <th class="px-6 py-3 text-left">Função</th>
                        <th class="px-6 py-3 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($companyAccess as $access)
                        <tr class="border-t border-gray-300 hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $access->user->name }}</td>
                            <td class="px-6 py-4">{{ $access->user->email }}</td>
                            <td class="px-6 py-4">{{ $access->role }}</td>
                            <td class="px-6 py-4 text-center">
                                <button wire:click="deleteUser('{{$access->user->id}}')" class="text-red-500 hover:text-red-700 transition duration-300">
                                    Remover
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Remover usuário da --}}
            <livewire:users.user-company-delete />
        </div>
    </div>

    <!-- Adicionar Usuário -->
    <div class="mt-6">
        <livewire:users.add-user-to-company />
    </div>

    <!-- Botão para Excluir -->
    <button wire:click="deleteCompany('{{ $company->id }}')"
        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="w-5 h-5 inline-block">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        Excluir
    </button>

    <livewire:company.company-delete />

</div>
