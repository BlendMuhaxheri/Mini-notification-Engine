<x-app-layout>

    <div class="p-8 space-y-6">

        <h1 class="text-3xl font-bold">Sent Notifications</h1>

        <div class="bg-white rounded-xl shadow border overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left">User</th>
                        <th class="text-left">Action Type</th>
                        <th class="text-left">Payload</th>
                        <th class="text-left">Created At</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($actions as $action)
                    <tr>
                        <td class="px-6 py-4">
                            {{ $action->user->email ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $action->action_type }}
                        </td>

                        <td>
                            <pre class="text-sm">{{ json_encode($action->payload, JSON_PRETTY_PRINT) }}</pre>
                        </td>

                        <td>
                            {{ $action->created_at }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            No actions found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-4">
                {{ $actions->links() }}
            </div>
        </div>

    </div>

</x-app-layout>