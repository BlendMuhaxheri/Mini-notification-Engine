<x-app-layout>

    <div class="max-w-4xl mx-auto p-8">

        <h1 class="text-3xl font-bold mb-6">Settings</h1>

        <div class="bg-white p-8 rounded-xl border shadow">

            <form class="space-y-6">

                <x-form.input
                    label="Application Name"
                    name="app_name"
                    value="Smart Notify" />

                <x-form.input
                    label="Admin Email"
                    name="admin_email"
                    value="admin@email.com" />

                <x-form.select
                    label="Default Status"
                    name="status"
                    :options="[
                    'active'=>'Active',
                    'inactive'=>'Inactive'
                ]" />

                <x-form.button>
                    Save Settings
                </x-form.button>

            </form>

        </div>

    </div>

</x-app-layout>