<div class="w-64 h-screen bg-gray-900 text-white flex flex-col">
    <div class="p-6 text-lg font-bold">Smart Notify</div>

    <nav class="flex-1 px-2 space-y-2">
        <x-layout.sidebar-link href="{{ route('dashboard') }}" label="Dashboard" />

        <x-layout.sidebar-link href="{{ route('rules.index') }}" label="Notification Rules" />

        <x-layout.sidebar-link href="{{route('user-actions')}}" label="User Actions" />

        <x-layout.sidebar-link href="{{route('notifications-sent')}}" label="Sent Notifications" />

        <x-layout.sidebar-link href="{{route('users')}}" label="Users" />

        <x-layout.sidebar-link href="#" label="Settings" />
    </nav>

    <div class="p-4 border-t border-gray-700">
        <a href="{{ route('logout') }}" class="block text-red-500 hover:text-red-400">
            Logout
        </a>
    </div>
</div>