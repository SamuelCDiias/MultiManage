<div class="max-w-4xl mx-auto p-6">
    <!-- Botão Criar Empresa (Canto Superior Direito) -->
    <div class="flex justify-end mb-4">
        <a href="{{route('company.create')}}" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
            Criar Empresa
        </a>
    </div>

    <!-- Título -->
    <h2 class="text-2xl font-bold mb-6 text-center">Minhas Empresas</h2>

    <!-- Tabela de Empresas -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase">Nome da Empresa</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase">Indústria</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $company->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $company->industry }}</td>
                        <td class="px-6 py-4 text-center">
                            <button wire:click="enterCompany({{ $company->id }})" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                                Entrar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
