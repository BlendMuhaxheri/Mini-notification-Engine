<x-app-layout>

    <div class="max-w-4xl mx-auto p-8">

        <h1 class="text-3xl font-bold mb-6">Create Notification Rule</h1>

        <div class="bg-white p-8 rounded-xl shadow border">

            <form method="POST" action="{{ route('rules.store') }}" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">

                    <x-form.select
                        label="Trigger Type"
                        name="type"
                        :options="[
                            'message' => 'Message',
                            'action_performed' => 'Action Performed',
                            'login' => 'Login'
                        ]" />

                    <x-form.select
                        label="Priority"
                        name="priority"
                        :options="[1=>1,2=>2,3=>3]" />

                </div>

                <div class="grid md:grid-cols-3 gap-4">

                    <x-form.input label="Field" name="conditions[0][field]" />

                    <x-form.select
                        label="Operator"
                        name="conditions[0][operator]"
                        :options="[
                            'equals' => 'Equals',
                            'not_equals' => 'Does Not Equal',
                            'contains' => 'Contains',
                            'not_contains' => 'Does Not Contain',
                            'starts_with' => 'Starts With',
                            'ends_with' => 'Ends With',
                            'in' => 'Is In',
                            'not_in' => 'Is Not In'
                        ]" />

                    <x-form.input label="Value" name="conditions[0][value]" />

                </div>

                <x-form.textarea
                    label="Notification Text"
                    name="notification_text" />

                <div class="flex gap-3">

                    <x-form.button type='submit'>
                        Save Rule
                    </x-form.button>

                    <x-form.button
                        href="{{ route('rules.index') }}"
                        variant="secondary">
                        Cancel
                    </x-form.button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>