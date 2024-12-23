<div>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Main Content -->
        <main class="flex-1 p-6 h-full overflow-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">{{ $company->name }} - Dashboard</h1>
                <div class="space-x-4">
                    <button
                        class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out shadow-md">
                        Nova Ação
                    </button>
                    <button wire:click='companyLogout'
                        class="bg-red-600 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition duration-300 ease-in-out shadow-md">
                        Logout
                    </button>
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl duration-300">
                    <h2 class="text-lg font-semibold text-gray-700">Total de Empresas</h2>
                    <p class="mt-4 text-4xl font-bold text-gray-900">{{ $totalCompanies ?? 0 }}</p>
                </div>
                <div
                    class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl duration-300">
                    <h2 class="text-lg font-semibold text-gray-700">Usuários Ativos</h2>
                    <p class="mt-4 text-4xl font-bold text-gray-900">{{ $activeUsers ?? 0 }}</p>
                </div>
                <div
                    class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl duration-300">
                    <h2 class="text-lg font-semibold text-gray-700">Faturamento Mensal</h2>
                    <p class="mt-4 text-4xl font-bold text-gray-900">R$ {{ $monthlyRevenue ?? '0,00' }}</p>
                </div>
                <div
                    class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl duration-300">
                    <h2 class="text-lg font-semibold text-gray-700">Tarefas Pendentes</h2>
                    <p class="mt-4 text-4xl font-bold text-gray-900">{{ $pendingTasks ?? 0 }}</p>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="mt-8 bg-white shadow-xl rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Atividades Recentes</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-left">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase">Ação</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase">Data</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-600 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentActivities ?? [] as $activity)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $activity['action'] }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $activity['date'] }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <span
                                            class="px-2 py-1 rounded-full text-white text-xs font-medium
                                        {{ $activity['status'] === 'Concluído' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                            {{ $activity['status'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
