<div>
    <div>
        <!-- Título e Informações da Empresa -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Configurações da Empresa</h2>
            <div class="text-sm text-gray-500 mt-2">
                <p><strong>Nome:</strong> {{ $company->name }}</p>
                <p><strong>Tipo:</strong> {{ $company->type }}</p>
                <p><strong>CNPJ:</strong> {{ $company->cnpj }}</p>
                <p><strong>Data de Criação:</strong> {{ $company->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <!-- Usuários da Empresa -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-700">Usuários Associados</h3>

            <table class="w-full mt-4 table-auto border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">Nome</th>
                        <th class="px-4 py-2 text-left">E-mail</th>
                        <th class="px-4 py-2 text-left">Função</th>
                        <th class="px-4 py-2 text-left">Data de Inclusão</th>
                        <th class="px-4 py-2 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($company->users as $user)
                        <tr>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->role }}</td>
                            <td class="px-4 py-2">{{ $user->pivot->created_at->format('d/m/Y') }}</td>
                            <td class="px-4 py-2">
                                <button wire:click="removeUser({{ $user->id }})" class="text-red-500 hover:text-red-700">Remover</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botão para Adicionar Usuário -->
        <div class="mt-4">
            <button wire:click="toggleForm" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Adicionar Usuário
            </button>
        </div>

        <!-- Modal para Adicionar Usuário -->
        @if ($showForm)
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Adicionar Usuário à Empresa</h3>

                    <form wire:submit.prevent="selectUser">
                        <div class="mb-4">
                            <label for="user" class="block text-sm font-medium text-gray-700">Selecionar Usuário</label>
                            <select wire:model="user_id" id="user" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Selecione um usuário</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="w-full bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
                            Adicionar Usuário
                        </button>
                    </form>

                    <button wire:click="toggleForm" class="mt-4 text-gray-500 hover:text-gray-700">Fechar</button>
                </div>
            </div>
        @endif
    </div>

</div>
