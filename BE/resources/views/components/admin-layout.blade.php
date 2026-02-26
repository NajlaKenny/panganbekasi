<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pangan Bekasi') }} - Admin</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-600 bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="flex flex-col w-64 bg-white border-r border-gray-200">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 border-b border-gray-100">
                <div class="flex items-center space-x-2">
                    <div class="bg-indigo-600 p-1.5 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800 tracking-tight">AdminPanel</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>

                <!-- Data Pasar -->
                <a href="{{ route('pasars.index') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('pasar.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">

                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('pasars.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M3 3h18v4H3zM3 7l9 6 9-6M4 10v10h16V10"></path>
                    </svg>
                    Data Pasar
                </a>

                <!-- Data Kategori -->
                <a href="{{ route('kategori.index') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('kategori.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">

                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('kategori.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M7 7h10M7 12h4m1 8h5a2 2 0 002-2V6a2 2 0 00-2-2H7l-4 4v10a2 2 0 002 2h6z"></path>
                    </svg>
                    Data Kategori
                </a>

                <!-- Data Barang -->
                <a href=""
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('barang.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">

                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('barang.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4">
                        </path>
                    </svg>
                    Data Barang
                </a>

                <!-- Data Harga -->
                <a href=""
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('harga.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">

                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('harga.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M12 8c-3 0-6 1.5-6 4s3 4 6 4 6-1.5 6-4-3-4-6-4zm0 0V4m0 8v8"></path>
                    </svg>
                    Data Harga
                </a>

                <a href="{{ route('users.index') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('users.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('users.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    Users
                </a>

                <a href="{{ route('profile.show') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('profile.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profile
                </a>

                <a href="{{ route('settings.index') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200 group {{ request()->routeIs('settings.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('settings.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                </a>
            </nav>

            <!-- User Info -->
            <div class="border-t border-gray-200 p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div
                            class="h-9 w-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 truncate w-32">{{ auth()->user()->name }}</p>
                        <p class="text-xs font-medium text-gray-500 truncate w-32">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6">
                <!-- Page Title -->
                <h2 class="text-lg font-semibold text-gray-800">
                    @if (request()->routeIs('dashboard'))
                        Dashboard
                    @elseif(request()->routeIs('users.*'))
                        User Management
                    @elseif(request()->routeIs('profile.*'))
                        Profile
                    @elseif(request()->routeIs('settings.*'))
                        Settings
                    @endif
                </h2>

                <!-- Right Actions -->
                <div class="flex items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200 flex items-center font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign out
                        </button>
                    </form>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
