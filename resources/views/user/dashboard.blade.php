<x-app-layout>

    <div class="space-y-8">

        {{-- HEADER --}}
        <div>
            <h1 class="text-3xl font-bold">Welcome, {{ auth()->user()->name }}</h1>
            <p class="text-slate-500">Your activity and notifications overview</p>
        </div>

        {{-- ACTION BOXES --}}
        <div class="grid md:grid-cols-2 gap-6">

            {{-- MESSAGE INPUT --}}
            <div class="bg-white p-6 rounded-xl shadow space-y-4">

                <h2 class="font-semibold text-lg">Send a Message</h2>

                <form method="POST" action="{{ route('user-events.store') }}" class="space-y-4">
                    @csrf

                    <input type="hidden" name="action_type" value="message">

                    <textarea
                        name="payload[text]"
                        class="w-full border rounded-lg p-3"
                        placeholder="Type something like: I need help with payment"></textarea>

                    <x-form.button type="submit">
                        Send Message
                    </x-form.button>
                </form>

            </div>

            {{-- QUICK ACTIONS --}}
            <div class="bg-white p-6 rounded-xl shadow space-y-4">

                <h2 class="font-semibold text-lg">Quick Actions</h2>

                <form method="POST" action="{{ route('user-events.store') }}">
                    @csrf

                    <input type="hidden" name="action_type" value="action_performed">
                    <input type="hidden" name="payload[action]" value="contact_support">

                    <x-form.button type="submit" class="w-full">
                        Contact Support
                    </x-form.button>
                </form>
                <form method="POST" action="{{ route('user-events.store') }}">
                    @csrf

                    <input type="hidden" name="action_type" value="action_performed">
                    <input type="hidden" name="payload[action]" value="report_issue">

                    <x-form.button type="submit" variant="secondary" class="w-full">
                        Report Issue
                    </x-form.button>
                </form>
            </div>

        </div>

        {{-- RECENT NOTIFICATIONS --}}
        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="font-semibold text-lg mb-4">Recent Notifications</h2>

            <a
                class="text-blue-600 hover:underline text-sm">
                View all notifications →
            </a>

        </div>

    </div>

</x-app-layout>