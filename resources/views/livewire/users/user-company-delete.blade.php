<div>
    <!-- Confirmação de Exclusão -->
    @if ($confirmDelete)
        <div class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Tem certeza que deseja remover este usuário?</h3>
                <div class="flex justify-around">
                    <button wire:click="deleteConfirmed"
                        class="bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 focus:outline-none">
                        Sim, Excluir
                    </button>
                    <button wire:click="deleteCanceled"
                        class="bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 focus:outline-none">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
