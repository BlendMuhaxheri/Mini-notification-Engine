<x-app-layout>

    <div class="space-y-6">

        <h1 class="text-2xl font-bold">Your Notifications</h1>

        <div class="bg-white rounded-xl shadow divide-y">

            @forelse($notifications as $notification)

            <div class="p-4 flex justify-between items-center">

                <div>
                    <p class="text-slate-800">
                        {{ $notification->message }}
                    </p>

                    <p class="text-xs text-slate-400">
                        {{ $notification->sent_at }}
                    </p>
                </div>

            </div>

            @empty

            <div class="p-6 text-slate-500">
                No notifications yet.
            </div>

            @endforelse

        </div>

    </div>

</x-app-layout>