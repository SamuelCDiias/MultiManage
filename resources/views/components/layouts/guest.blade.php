<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 antialiased">
    <!-- Barra de Navegação -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                </a>
            </div>
            <nav class="flex items-center space-x-4">
                <a href="{{route('index')}}"
                    class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Início</a>
                <a href="#"
                    class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Sobre</a>
                <a href="#"
                    class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Contato</a>
                <a href="{{route('login')}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Entrar</a>
            </nav>
        </div>
    </header>

    {{ $slot }}

    <!-- Rodapé -->
    <footer class="bg-gray-800 text-gray-200 py-6">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos os direitos reservados.</p>
            <div class="mt-4 flex justify-center space-x-4">
                <a href="#" class="text-gray-400 hover:text-gray-200">Política de Privacidade</a>
                <a href="#" class="text-gray-400 hover:text-gray-200">Termos de Uso</a>
            </div>
        </div>
    </footer>
</body>

</html>
