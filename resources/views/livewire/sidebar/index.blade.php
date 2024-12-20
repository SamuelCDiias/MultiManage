<div>
    <!-- Banner Principal -->
    <div class="relative bg-cover bg-center h-96" style="background-image: url('https://source.unsplash.com/random/1600x900');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-4xl font-bold text-white">Bem-vindo ao {{ config('app.name', 'Laravel') }}</h1>
            <p class="text-gray-300 text-lg mt-4">Explore nossos serviços e descubra como podemos ajudar você!</p>
            <a href="{{ route('register') }}" class="mt-6 bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition">
                Cadastre-se Agora
            </a>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <main class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-semibold text-center mb-6">Nossos Serviços</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card de Serviço -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-4">Gestão de Empresas</h3>
                <p class="text-gray-600 dark:text-gray-300">Gerencie múltiplas empresas de forma eficiente e prática.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-4">Relatórios Personalizados</h3>
                <p class="text-gray-600 dark:text-gray-300">Obtenha relatórios detalhados e adaptados às suas necessidades.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-4">Segurança de Dados</h3>
                <p class="text-gray-600 dark:text-gray-300">Seus dados estão protegidos com a mais alta segurança.</p>
            </div>
        </div>
    </main>
</div>
