<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-slate-900 text-white flex flex-col">

            <!-- BRAND -->
            <div class="h-16 flex items-center px-6 border-b border-slate-800 font-bold text-lg">
                Smart Notify
            </div>

            <!-- NAV -->
            <nav class="flex-1 px-4 py-6 space-y-1">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-slate-800 transition">
                    Dashboard
                </a>

                <a href="{{ route('rules.index') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-slate-800 transition">
                    Notification Rules
                </a>

            </nav>

            <!-- FOOTER -->
            <div class="p-4 border-t border-slate-800 text-sm text-slate-400">
                v1.0
            </div>

        </aside>

        <!-- MAIN AREA -->
        <div class="flex-1 flex flex-col">

            <!-- TOP BAR -->
            <header class="h-16 bg-white border-b flex items-center justify-between px-8">

                <div class="font-semibold text-slate-700">
                    @yield('title', 'Dashboard')
                </div>

                <div class="text-sm text-slate-500">
                    {{ auth()->user()->name ?? '' }}
                </div>

            </header>

            <!-- CONTENT (IMPORTANT: FIXED WIDTH SYSTEM) -->
            <main class="p-8 bg-slate-50 min-h-screen">

                <div class="max-w-7xl mx-auto space-y-6">
                    {{ $slot }}
                </div>

            </main>

        </div>

    </div>

</body>

</html>