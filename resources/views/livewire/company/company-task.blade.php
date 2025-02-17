<div class="bg-white p-10 rounded-lg shadow-xl max-w-screen-lg mx-auto">
    <!-- Lista de Tarefas -->
    <div class="bg-gray-50 p-6 rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Lista de Tarefas</h2>
        @if($tasks->isEmpty())
            <h2 class="flex items-center justify-center">Nenhuma Tarefa</h2>
        @else
        <div class="overflow-x-auto shadow-xl rounded-md">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium">Título</th>
                        <th class="px-6 py-3 text-left font-medium">Descrição</th>
                        <th class="px-6 py-3 text-left font-medium">Status</th>
                        <th class="px-6 py-3 text-left font-medium">Data de Conclusão</th>
                        <th class="px-6 py-3 text-center font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $task->title }}</td>
                            <td class="px-6 py-4">{{ $task->description }}</td>
                            <td class="px-6 py-4">{{ $task->status }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-center">
                                <button wire:click="openEditModal('{{ $task->id }}')"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</button>
                                <button wire:click="delete('{{ $task->id }}')"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>

    <!-- Modal de Criação -->
    @if ($toggleForm)
        <div class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 flex items-center justify-center">
            <div class="relative bg-white p-8 rounded-lg shadow-lg max-w-md w-full space-y-4">
                <h2 class="text-xl font-bold">Criar Tarefa</h2>

                <div>
                    <label class="block text-gray-700">Título</label>
                    <input type="text" wire:model="title" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div>
                    <label class="block text-gray-700">Descrição</label>
                    <textarea wire:model="description" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>

                <div>
                    <label class="block text-gray-700">Status</label>
                    <select wire:model="status" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="pendente">Pendente</option>
                        <option value="em andamento">Em Andamento</option>
                        <option value="concluida">Concluida</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700">Data de Conclusão</label>
                    <input type="date" wire:model="due_date" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="flex justify-end space-x-4">
                    <button wire:click="showForm"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Cancelar</button>
                    <button wire:click="create"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Salvar</button>
                </div>
            </div>
        </div>
    @endif

    @livewire('company.company-task-delete')

    {{-- SweetAlert --}}

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
