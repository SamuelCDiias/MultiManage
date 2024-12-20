<div class="space-x-4">
    <!-- Botão para abrir o modal -->
    <button wire:click="toggleForm"
        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
        Adicionar Usuário
    </button>

    @if ($showForm)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Adicionar Usuário à Empresa</h3>

                <!-- Exibição das mensagens flash -->
                @if (session()->has('message'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="bg-red-500 text-white p-2 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Formulário de Adicionar Usuário -->
                <form wire:submit.prevent="selectUser">
                    <!-- Selecionar o Usuário -->
                    <div class="mb-4">
                        <label for="user" class="block text-sm font-medium text-gray-700">Selecionar Usuário</label>
                        <select wire:model="user_id" id="user"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecione um usuário</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Selecionar a Função -->
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Função</label>
                        <select wire:model="role" id="role"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecione uma função</option>
                            <option value="admin">Administrador</option>
                            <option value="user">Usuário</option>
                            <option value="manager">Gerente</option>
                        </select>
                        @error('role')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botão de Submissão -->
                    <button type="submit"
                        class="w-full bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
                        Adicionar Usuário
                    </button>
                </form>

                <!-- Botão de Fechar Modal -->
                <button wire:click="toggleForm" class="mt-4 text-gray-500 hover:text-gray-700">Fechar</button>
            </div>
        </div>
    @endif
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
</div>
