<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-indigo-500 to-teal-400">
    <div class="w-full max-w-6xl px-6 py-12 bg-white rounded-lg shadow-xl">

        <!-- Seção de boas-vindas -->
        <div class="text-center mb-12">
            <h2 class="text-5xl font-extrabold text-gray-900 mb-6">Bem-vindo ao MultiManage</h2>
            <p class="text-xl text-gray-600 mb-8">
                A solução definitiva para gerenciar múltiplas empresas com facilidade e eficiência.
            </p>
            <div class="space-y-6">
                <a wire:click="register"
                    class="inline-block px-10 py-4 bg-indigo-600 text-white text-lg font-semibold rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    Começar Agora
                </a>
                <a href="#"
                    class="inline-block px-10 py-4 bg-transparent border-2 border-indigo-600 text-indigo-600 text-lg font-semibold rounded-lg shadow-lg hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-all duration-300 transform hover:scale-105">
                    Saiba Mais
                </a>
            </div>
        </div>

        <!-- Seção de funcionalidades -->
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Funcionalidade 1 -->
            <div class="flex flex-col items-center p-8 bg-indigo-50 rounded-lg shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                <svg class="w-16 h-16 text-indigo-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Gestão Simplificada</h3>
                <p class="text-center text-gray-600">Gerencie todas as suas empresas em um único lugar, de forma intuitiva e eficiente.</p>
            </div>

            <!-- Funcionalidade 2 -->
            <div class="flex flex-col items-center p-8 bg-indigo-50 rounded-lg shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                <svg class="w-16 h-16 text-indigo-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Relatórios em Tempo Real</h3>
                <p class="text-center text-gray-600">Acompanhe os resultados de suas empresas com relatórios detalhados e atualizados em tempo real.</p>
            </div>

            <!-- Funcionalidade 3 -->
            <div class="flex flex-col items-center p-8 bg-indigo-50 rounded-lg shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                <svg class="w-16 h-16 text-indigo-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Segurança e Privacidade</h3>
                <p class="text-center text-gray-600">Com recursos avançados de segurança, seus dados estão sempre protegidos e privados.</p>
            </div>
        </div>

        <!-- Seção de links -->
        <div class="mt-12 text-center">
            <p class="text-sm text-gray-600 mb-2">Já tem uma conta?</p>
            <a wire:click="login"
                class="text-sm font-medium text-indigo-600 hover:underline transition-all duration-200 cursor-pointer">Faça login</a>
        </div>
    </div>
</div>
