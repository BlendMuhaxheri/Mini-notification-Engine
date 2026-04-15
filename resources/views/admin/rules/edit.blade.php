<x-app-layout>

    <div class="max-w-4xl mx-auto p-8">

        <h1 class="text-3xl font-bold mb-6">Import Notification Rules</h1>

        <div class="bg-white p-8 rounded-xl shadow border">

            <form
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf

                <div class="border-2 border-dashed rounded-xl p-10 text-center">

                    <p class="text-slate-500 mb-4">
                        Drag & Drop JSON File Here
                    </p>

                    <input type="file" name="rules_file">

                </div>

                <div class="flex gap-3">

                    <x-form.button>
                        Import Rules
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