<div class="flex min-h-screen bg-gray-100">
    {{-- Script Charts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Main Content -->
    <main class="flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $company->name }} - Dashboard
            </h1>
            <div class="flex space-x-4">
                <button wire:click='createTask'
                    class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 shadow-md transition">
                    Criar Tarefa
                </button>
                <button
                    class="bg-green-500 text-white px-5 py-2 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-300 shadow-md transition">
                    Nova Ação
                </button>
                <button wire:click='companyLogout'
                    class="bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-300 shadow-md transition">
                    Logout
                </button>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow-md rounded-lg p-6 border-t-4 border-blue-500 transition hover:scale-105">
                <h2 class="text-lg font-semibold text-gray-700">Total de Clientes</h2>
                <p class="mt-4 text-4xl font-bold text-gray-900">{{ $totalCompanies ?? 0 }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 border-t-4 border-green-500 transition hover:scale-105">
                <h2 class="text-lg font-semibold text-gray-700">Usuários Ativos</h2>
                <p class="mt-4 text-4xl font-bold text-gray-900">{{ $activeUsers ?? 0 }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 border-t-4 border-yellow-500 transition hover:scale-105">
                <h2 class="text-lg font-semibold text-gray-700">Faturamento Anual</h2>
                <p class="mt-4 text-4xl font-bold text-gray-900">R$ {{ $monthlyRevenue ?? '0,00' }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 border-t-4 border-red-500 transition hover:scale-105">
                <h2 class="text-lg font-semibold text-gray-700">Tarefas Pendentes</h2>
                <p class="mt-4 text-4xl font-bold text-gray-900">{{ count($tasks) ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 mb-8">
            @livewire('charts.billings')
        </div>

        <!-- Tasks -->
        <div class="bg-white rounded-lg p-6 mb-8">
            @livewire('company.company-task')
        </div>

        <!-- Recent Activities -->
        {{-- <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-6">Atividades Recentes</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">Ação</th>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">Data</th>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentActivities ?? [] as $activity)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $activity['action'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $activity['date'] }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $activity['status'] === 'Concluído' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }}">
                                        {{ $activity['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}


    </main>
    {{-- Script Charts --}}
    @livewireChartsScripts
</div>
