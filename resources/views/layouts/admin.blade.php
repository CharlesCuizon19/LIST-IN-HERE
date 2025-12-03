<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Silid Cuadrado Admin')</title>

    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- DataTables & SweetAlert -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
</head>

<body x-data="{ sidebarOpen: true }" class="flex min-h-screen bg-[#f5f5f5] text-[#0a1a3a]">

    {{-- Sidebar --}}
    <aside
        :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="bg-white flex-shrink-0 flex flex-col justify-between min-h-screen transition-all duration-300 shadow-lg border-r border-gray-200">

        <!-- Top Section -->
        <div>
            <!-- Logo + Toggle -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <!-- Full Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Silid Cuadrado Logo"
                    class="h-10 w-auto" x-show="sidebarOpen" x-transition>

                <!-- Small Logo -->
                <img src="{{ asset('images/icon-img.png') }}" alt="Logo"
                    class="h-10 w-auto mx-auto" x-show="!sidebarOpen" x-transition>

                <!-- Toggle Button -->
                <button class="text-gray-500 hover:text-[#25464b]" @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 transform transition-transform duration-300"
                        :class="sidebarOpen ? 'rotate-0' : 'rotate-180'"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="p-4 text-sm">
                <ul class="space-y-2">

                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition 
                           {{ request()->routeIs('admin.dashboard') 
                                ? 'bg-[#25464b] text-white' 
                                : 'hover:bg-gray-100 text-[#0a1a3a]' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z" />
                            </svg>
                            <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <!-- Homepage Banner -->
                    <li>
                        <a href="{{ route('admin.banners.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition 
                           {{ request()->routeIs('admin.banners.*') 
                                ? 'bg-[#25464b] text-white' 
                                : 'hover:bg-gray-100 text-[#0a1a3a]' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v16H4V4z" />
                            </svg>
                            <span x-show="sidebarOpen" class="ml-3">Homepage Banner</span>
                        </a>
                    </li>

                    <!-- Category Type -->
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition 
                           {{ request()->routeIs('admin.categories.*') 
                                ? 'bg-[#25464b] text-white' 
                                : 'hover:bg-gray-100 text-[#0a1a3a]' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v16H4V4z" />
                            </svg>
                            <span x-show="sidebarOpen" class="ml-3">Category Type</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}" class="p-4 border-t border-gray-200">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 w-full px-3 py-2 rounded-lg text-[#0a1a3a] hover:bg-gray-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
                <span x-show="sidebarOpen">Logout</span>
            </button>
        </form>

    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">

        <!-- Header -->
        <header class="bg-white border-b border-gray-200 p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-[#25464b]">@yield('title')</h1>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 bg-[#f5f5f5] text-[#0a1a3a]">
            @yield('content')
        </main>

    </div>

    @stack('scripts')
</body>

</html>

{{-- DATATABLE THEME --}}
<style>
    table.dataTable {
        background-color: white !important;
        color: #0a1a3a !important;
        border-collapse: collapse !important;
    }

    table.dataTable thead th {
        background-color: #f5f5f5 !important;
        color: #25464b !important;
        border-bottom: 2px solid #d1d5db !important;
        font-size: 13px;
        padding: 10px !important;
        font-weight: bold;
    }

    table.dataTable tbody td {
        background-color: white !important;
        color: #0a1a3a !important;
        border-bottom: 1px solid #e5e7eb !important;
        padding: 8px !important;
        font-size: 12px;
    }

    table.dataTable tbody tr:hover {
        background-color: #f8fafc !important;
    }

    .dataTables_wrapper .dataTables_filter input {
        background: white !important;
        border: 1px solid #25464b !important;
        padding: 5px;
        border-radius: 6px;
        color: #0a1a3a !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background-color: white !important;
        border: 1px solid #d1d5db !important;
        color: #25464b !important;
        padding: 4px 10px !important;
        border-radius: 6px !important;
        margin: 2px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #25464b !important;
        color: white !important;
    }
</style>