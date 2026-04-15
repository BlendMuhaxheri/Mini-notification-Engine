<x-app-layout>

    <div class="p-8 space-y-6">

        <h1 class="text-3xl font-bold">Sent Notifications</h1>

        <div class="bg-white rounded-xl shadow border overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left">User</th>
                        <th class="text-left">Rule</th>
                        <th class="text-left">Message</th>
                        <th class="text-left">Sent At</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    <tr>
                        <td class="px-6 py-4">john@email.com</td>
                        <td>Help Ticket Rule</td>
                        <td>Help ticket created</td>
                        <td>2026-04-12 15:00</td>
                    </tr>

                    <tr>
                        <td class="px-6 py-4">admin@email.com</td>
                        <td>Contact Rule</td>
                        <td>Someone contacted support</td>
                        <td>2026-04-12 16:00</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>