<div class="bg-white p-10 rounded-3xl shadow-2xl shadow-gray-600/50 max-w-screen-lg mx-auto my-8 space-y-10">
    <!-- Título e Informações da Empresa -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white p-8 rounded-3xl shadow-xl shadow-blue-800/50">
        <h2 class="text-4xl font-bold mb-6">Configurações da Empresa</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-base">
            <p><strong class="text-indigo-300">Nome:</strong> <span class="text-white">{{ $company->name }}</span></p>
            <p><strong class="text-indigo-300">Tipo:</strong> <span class="text-white">{{ $company->industry }}</span></p>
            <p><strong class="text-indigo-300">CNPJ:</strong> <span class="text-white">{{ $company->cnpj }}</span></p>
            <p><strong class="text-indigo-300">Data de Criação:</strong>
                <span class="text-white">{{ $company->created_at->format('d/m/Y') }}</span>
            </p>
        </div>
    </div>

    <!-- Usuários da Empresa -->
    <div class="bg-gray-50 p-8 rounded-3xl shadow-lg ">
        <h3 class="text-3xl font-semibold text-gray-700 mb-6">Usuários Associados</h3>
        <div class="overflow-x-auto bg-white rounded-lg shadow-md shadow-gray-500/50">
            <table class="min-w-full text-left table-auto text-gray-700">
                <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3 font-medium">Nome</th>
                        <th class="px-6 py-3 font-medium">E-mail</th>
                        <th class="px-6 py-3 font-medium">Função</th>
                        <th class="px-6 py-3 font-medium text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($companyAccess as $access)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="px-6 py-4">{{ $access->user->name }}</td>
                            <td class="px-6 py-4">{{ $access->user->email }}</td>
                            <td class="px-6 py-4">{{ $access->role }}</td>
                            <td class="px-6 py-4 text-center">
                                <button wire:click="deleteUser('{{ $access->user->id }}')"
                                    class="text-red-500 hover:text-red-700 transition duration-200">
                                    Remover
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ações da Empresa -->
    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
        <livewire:users.add-user-to-company />

        <button wire:click="deleteCompany('{{ $company->id }}')"
            class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 shadow-lg shadow-red-500/50 flex items-center space-x-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <span>Excluir Empresa</span>
        </button>
    </div>

    <!-- Componentes Livewire -->
    <livewire:company.company-delete />
    <livewire:users.user-company-delete />
</div>
