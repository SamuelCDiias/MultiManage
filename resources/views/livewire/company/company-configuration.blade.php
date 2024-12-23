<div class="bg-white p-8 rounded-3xl shadow-2xl max-w-6xl mx-auto space-y-8">
    <!-- Título e Informações da Empresa -->
    <div class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white p-6 rounded-2xl shadow-xl">
        <h2 class="text-4xl font-semibold">Configurações da Empresa</h2>
        <div class="text-sm mt-4 space-y-2">
            <p><strong class="text-indigo-200">Nome:</strong> <span class="text-indigo-100">{{ $company->name }}</span>
            </p>
            <p><strong class="text-indigo-200">Tipo:</strong> <span
                    class="text-indigo-100">{{ $company->industry }}</span></p>
            <p><strong class="text-indigo-200">CNPJ:</strong> <span class="text-indigo-100">{{ $company->cnpj }}</span>
            </p>
            <p><strong class="text-indigo-200">Data de Criação:</strong> <span
                    class="text-indigo-100">{{ $company->created_at->format('d/m/Y') }}</span></p>
        </div>
    </div>

    <!-- Usuários da Empresa -->
    <div class="bg-white p-6 rounded-2xl shadow-xl">
        <h3 class="text-3xl font-semibold text-gray-700">Usuários Associados</h3>
        <div class="overflow-x-auto mt-4 bg-gray-50 rounded-xl shadow-sm">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left">Nome</th>
                        <th class="px-6 py-3 text-left">E-mail</th>
                        <th class="px-6 py-3 text-left">Função</th>
                        <th class="px-6 py-3 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($companyAccess as $access)
                        <tr class="border-t border-gray-300 hover:bg-gray-100">
                            <td class="px-6 py-4 text-gray-700">{{ $access->user->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $access->user->email }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $access->role }}</td>
                            <td class="px-6 py-4 text-center">
                                <button wire:click="deleteUser('{{ $access->user->id }}')"
                                    class="text-red-500 hover:text-red-700 transition duration-300">
                                    <span class="text-sm">Remover</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <!-- Adicionar Novo Usuário -->
        <livewire:users.add-user-to-company />

        <button wire:click="deleteCompany('{{ $company->id }}')"
            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6 inline-block mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            Excluir Empresa
        </button>
    </div>

    <!-- Livewire para deletar empresa -->
    <livewire:company.company-delete />

    {{-- Livewire para deletar empresa --}}
    <livewire:users.user-company-delete />
</div>
