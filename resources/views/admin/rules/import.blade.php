<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Import Notification Rules</h1>

    <form action="{{ route('rules.import') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="border-dashed border-2 border-gray-300 p-10 text-center">
            <p>Drag and drop your JSON file here or</p>
            <input type="file" name="rules_file" class="mt-2" />
        </div>

        <form method="POST" action="{{route(rules.import)}}">
            <x-primary-button type="submit">Import Rules</x-primary-button>
        </form>
        <x-secondary-button :href="route('rules.index')">Cancel</x-secondary-button>
    </form>
</x-app-layout>