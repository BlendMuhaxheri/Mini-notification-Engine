<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Smart Notify') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-72 bg-slate-900 text-white flex flex-col">

            {{-- LOGO --}}
            <div class="h-16 flex items-center px-6 border-b border-slate-800 font-bold text-lg">
                Smart Notify
            </div>

            {{-- NAVIGATION --}}
            <nav class="flex-1 px-4 py-6 space-y-2">

                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Dashboard
                </a>

                <a href="{{ route('rules.index') }}"
                    class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Notification Rules
                </a>

                <a href="#"
                    class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Notifications
                </a>

                <a href="#"
                    class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Users
                </a>

                <a href="#"
                    class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Reports
                </a>

                <a href="#"
                    class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Settings
                </a>

            </nav>

            {{-- FOOTER --}}
            <div class="p-4 border-t border-slate-800 text-sm text-slate-400">
                v1.0
            </div>

        </aside>

        {{-- MAIN CONTENT --}}
        <div class="flex-1 flex flex-col">

            {{-- TOP BAR --}}
            <header class="h-16 bg-white border-b flex items-center justify-between px-8">

                @if(auth()->user()->role == 'admin')
                <h2 class="font-semibold text-slate-700">
                    Admin Panel
                </h2>
                @else

                <div class="text-sm text-slate-500">
                    {{ auth()->user()->name }}
                </div>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="px-3 py-1.5 rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </header>

            {{-- PAGE CONTENT --}}
            <main class="p-8">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>

</html>