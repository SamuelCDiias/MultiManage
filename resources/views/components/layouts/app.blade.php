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

<body class="font-sans antialiased">
    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white flex flex-col fixed h-full">
            <!-- Branding -->
            <div class="px-6 py-4 text-lg font-semibold border-b border-blue-700">
                {{ config('app.name', 'Laravel') }}
            </div>
            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-4">

                @if (session('active_company'))
                    <a href="{{ route('company.dashboard') }}"
                        class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition" wire:navigate>
                        <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 10h11M9 21V3m-5 8a5 5 0 1010 0" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                        wire:navigate>
                        <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a4 4 0 10-8 0v2M5 12h14" />
                        </svg>
                        Configurações
                    </a>
                @endif

                <a href="{{ route('companies.show') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M10 14h6" />
                    </svg>
                    Empresas
                </a>
            </nav>
            <!-- Logout -->
            <div class="p-4 border-t border-blue-700">
                <livewire:logout />
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64 pt-1">
            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
