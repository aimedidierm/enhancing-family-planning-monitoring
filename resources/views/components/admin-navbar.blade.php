<div class="w-64 h-screen bg-blue-700 text-white">
    <div class="p-6">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
    </div>
    <nav class="mt-10">
        <ul>
            <li class="mb-6">
                <a href="/admin"
                    class="flex items-center p-3 text-lg font-medium hover:bg-blue-600 rounded-lg {{ request()->is('admin') ? 'bg-blue-400 rounded' : '' }}">
                    <span class="mr-3">📊</span> Dashboard
                </a>
            </li>
            <li class="mb-6">
                <a href="/admin/admins"
                    class="flex items-center p-3 text-lg font-medium hover:bg-blue-600 rounded-lg {{ request()->is('admin/admins') ? 'bg-blue-400 rounded' : '' }}">
                    <span class="mr-3">👥</span> Admins
                </a>
            </li>
            <li class="mb-6">
                <a href="/admin/patients"
                    class="flex items-center p-3 text-lg font-medium hover:bg-blue-600 rounded-lg {{ request()->is('admin/patients') ? 'bg-blue-400 rounded' : '' }}">
                    <span class="mr-3">👤</span> Patients
                </a>
            </li>
            <li class="mb-6">
                <a href="/admin/announcements"
                    class="flex items-center p-3 text-lg font-medium hover:bg-blue-600 rounded-lg {{ request()->is('admin/announcements') ? 'bg-blue-400 rounded' : '' }}">
                    <span class="mr-3">📢</span> Announcements
                </a>
            </li>
            <li class="mb-6">
                <a href="/admin/contraceptive"
                    class="flex items-center p-3 text-lg font-medium hover:bg-blue-600 rounded-lg {{ request()->is('admin/contraceptive') ? 'bg-blue-400 rounded' : '' }}">
                    <span class="mr-3">💊</span> Contraceptive
                </a>
            </li>
            <li class="mb-6">
                <a href="/admin/settings"
                    class="flex items-center p-3 text-lg font-medium hover:bg-blue-600 rounded-lg {{ request()->is('admin/settings') ? 'bg-blue-400 rounded' : '' }}">
                    <span class="mr-3">⚙️</span> Settings
                </a>
            </li>
            <li class="mb-6">
                <a href="/auth/logout" class="flex items-center p-3 text-lg font-medium hover:bg-blue-600 rounded-lg">
                    <span class="mr-3">🚪</span> Logout
                </a>
            </li>
        </ul>
    </nav>
</div>