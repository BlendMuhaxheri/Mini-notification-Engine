<x-app-layout>

    <div class="p-8 space-y-8">

        <h1 class="text-3xl font-bold">Dashboard Overview</h1>

        {{-- STATS --}}
        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-xl shadow border">
                <p class="text-slate-500">Total Rules</p>
                <h2 class="text-3xl font-bold">{{ $totalRules }}</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow border">
                <p class="text-slate-500">Notifications Sent</p>
                <h2 class="text-3xl font-bold">{{ $totalNotifications }}</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow border">
                <p class="text-slate-500">Users</p>
                <h2 class="text-3xl font-bold">{{ $totalUsers }}</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow border">
                <p class="text-slate-500">Active Users</p>
                <h2 class="text-3xl font-bold">8</h2>
            </div>

        </div>

        {{-- ACTION CARDS --}}
        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-white p-6 rounded-xl shadow border">
                <h3 class="font-bold text-lg">Rules</h3>
                <p class="text-slate-500 mt-1">Manage notification rules</p>

                <x-form.button
                    href="{{ route('rules.index') }}"
                    variant="primary"
                    class="mt-4">
                    Open
                </x-form.button>
            </div>

            <div class="bg-white p-6 rounded-xl shadow border">
                <h3 class="font-bold text-lg">Import</h3>
                <p class="text-slate-500 mt-1">Import rules via JSON</p>

                <form action="{{ route('rules.import') }}" method="POST" class="mt-4">
                    @csrf

                    <x-form.button type="submit" variant="success">
                        Start Import
                    </x-form.button>
                </form>
            </div>

        </div>

    </div>

</x-app-layout>