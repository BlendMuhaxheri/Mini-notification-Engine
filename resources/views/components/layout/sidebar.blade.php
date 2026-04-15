<div class="w-64 h-screen bg-gray-900 text-white flex flex-col">
    <div class="p-6 text-lg font-bold">Smart Notify</div>
    <nav class="flex-1 px-2 space-y-2">
        <x-sidebar-link href="{{ route('dashboard') }}" label="Dashboard" />
        <x-sidebar-link href="{{ route('notification.rules') }}" label="Notification Rules" active />
        <x-sidebar-link href="{{ route('user.actions') }}" label="User Actions" />
        <x-sidebar-link href="{{ route('sent.notifications') }}" label="Sent Notifications" />
        <x-sidebar-link href="{{ route('users') }}" label="Users" />
        <x-sidebar-link href="{{ route('reports') }}" label="Reports" />
        <x-sidebar-link href="{{ route('settings') }}" label="Settings" />
    </nav>
    <div class="p-4 border-t border-gray-700">
        <a href="{{ route('logout') }}" class="block text-red-500 hover:text-red-400">Logout</a>
    </div>
</div>