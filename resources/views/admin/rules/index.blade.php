<x-app-layout>

    <div class="p-8 space-y-6">

        <div class="flex justify-between items-center">

            <h1 class="text-3xl font-bold">Notification Rules</h1>

            <div class="flex gap-3">
                <x-form.button href="{{ route('rules.create') }}">
                    Create Rule
                </x-form.button>

                <x-form.button variant="secondary">
                    Import Rules
                </x-form.button>
            </div>

        </div>

        <form method="GET">

            <div class="grid md:grid-cols-5 gap-4">

                <div class="md:col-span-2">
                    <x-form.input
                        label="Search Rules"
                        name="search"
                        value="{{ request('search') }}" />
                </div>

                <x-form.select
                    label="Trigger Type"
                    name="trigger_type"
                    :options="[
                    ''=>'All Trigger Types',
                    'message_contains'=>'Message Contains',
                    'action_performed'=>'Action Performed'
                ]" />

                <x-form.select
                    label="Status"
                    name="status"
                    :options="[
                    ''=>'All Status',
                    'active'=>'Active',
                    'inactive'=>'Inactive'
                ]" />

                <div class="flex items-end">
                    <x-form.button type="submit">
                        Filter
                    </x-form.button>
                </div>

            </div>

        </form>

        <x-table.table>

            <x-slot name="head">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th>Trigger</th>
                    <th>Conditions</th>
                    <th>Notification Text</th>
                    <th>Priority</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </x-slot>

            <x-slot name="body">

                @foreach($rules as $rule)
                <tr>

                    <td class="px-6 py-4">{{ $rule->id }}</td>

                    <td>{{ $rule->type }}</td>

                    <td>
                        @foreach($rule->conditions as $condition)
                        <div>
                            {{ $condition->field }}
                            {{ $condition->operator }}
                            {{ $condition->value }}
                        </div>
                        @endforeach
                    </td>

                    <td>{{ $rule->notification_text }}</td>

                    <td>{{ $rule->priority }}</td>

                    <td>{{ $rule->created_at->format('Y-m-d') }}</td>

                    <td class="flex gap-2 py-4">

                        <x-form.button
                            href="{{ route('rules.edit',$rule->id) }}"
                            variant="secondary">
                            Edit
                        </x-form.button>

                        <form method="POST" action="{{ route('rules.destroy',$rule->id) }}">
                            @csrf
                            @method('DELETE')

                            <x-form.button type='submit' variant="danger">
                                Delete
                            </x-form.button>
                        </form>

                    </td>

                </tr>
                @endforeach

            </x-slot>

        </x-table.table>

    </div>

</x-app-layout>