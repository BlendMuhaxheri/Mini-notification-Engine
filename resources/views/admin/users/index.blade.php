<x-app-layout>

    <div class="p-8">

        <h1 class="text-3xl font-bold mb-6">Users</h1>

        {{-- Stats --}}
        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-xl border shadow">
                <h3 class="font-semibold">Total Users</h3>
                <p class="text-3xl mt-2 font-bold">{{ $users->total() }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl border shadow">
                <h3 class="font-semibold">Admins</h3>
                <p class="text-3xl mt-2 font-bold">
                    {{ \App\Models\User::where('role', 'admin')->count() }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl border shadow">
                <h3 class="font-semibold">Online Now</h3>
                <p class="text-3xl mt-2 font-bold">—</p>
            </div>

        </div>

        {{-- Users list --}}
        <div class="mt-8 bg-white border rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left">User</th>
                        <th class="text-left">Actions</th>
                        <th class="text-left">Notifications</th>
                        <th class="text-left">Joined</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>

                        <td>
                            {{ $user->actions->count() }}
                        </td>

                        <td>
                            {{ $user->notificationsSent->count() }}
                        </td>

                        <td>
                            {{ $user->created_at }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $users->links() }}
        </div>

    </div>

</x-app-layout>