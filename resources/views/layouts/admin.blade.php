<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { sage: {
            50: '#f4f6f2', 100: '#e6ebe1', 200: '#cdd7c3', 300: '#aebd9d', 400: '#93a67e',
            500: '#7c8f6e', 600: '#63735a', 700: '#4f5c48', 800: '#414b3c', 900: '#374033',
        } } }, fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'system-ui'] } } }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none; }
    </style>
    @stack('head')
</head>
<body class="bg-gray-50 text-gray-700" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-sage-700 text-white flex-shrink-0 fixed inset-y-0 left-0 z-30 transform transition-transform duration-200 lg:translate-x-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="px-6 py-6 flex items-center gap-3 border-b border-white/10">
                <span class="w-10 h-10 rounded-full bg-white/20 flex-shrink-0"></span>
                <div class="leading-tight">
                    <p class="text-sm font-semibold">PP Nur Cahaya</p>
                    <p class="text-xs text-white/70">Panel Admin</p>
                </div>
            </div>
            <nav class="px-4 py-6 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-sage-500 text-white' : 'text-white/80 hover:bg-sage-600' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.articles.*') ? 'bg-sage-500 text-white' : 'text-white/80 hover:bg-sage-600' }}">
                    Artikel
                </a>
                <a href="{{ route('admin.activities.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.activities.*') ? 'bg-sage-500 text-white' : 'text-white/80 hover:bg-sage-600' }}">
                    Kegiatan
                </a>
                <a href="{{ route('admin.ppdb.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.ppdb.*') ? 'bg-sage-500 text-white' : 'text-white/80 hover:bg-sage-600' }}">
                    Pendaftar PPDB
                </a>
                <a href="{{ route('admin.kritik-saran.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.kritik-saran.*') ? 'bg-sage-500 text-white' : 'text-white/80 hover:bg-sage-600' }}">
                    Kritik &amp; Saran
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-sage-500 text-white' : 'text-white/80 hover:bg-sage-600' }}">
                    Pengaturan Konten
                </a>
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/80 hover:bg-sage-600">
                    Lihat Situs
                </a>
                <form action="{{ route('logout') }}" method="POST" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-3 px-4 py-2.5 rounded-lg text-white/80 hover:bg-sage-600">
                        Keluar
                    </button>
                </form>
            </nav>
        </aside>

        <div class="flex-1 lg:ml-64">
            <!-- Topbar -->
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 z-20">
                <button class="lg:hidden text-gray-500" @click="sidebarOpen = !sidebarOpen">&#9776;</button>
                <h1 class="text-lg font-semibold text-gray-900">{{ $title ?? 'Dashboard' }}</h1>
                <div class="flex items-center gap-3 text-sm text-gray-500">
                    <span class="w-8 h-8 rounded-full bg-sage-200 inline-block"></span>
                    <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                </div>
            </header>

            <main class="p-6">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-5 py-3 mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-5 py-3 mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
