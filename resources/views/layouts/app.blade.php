<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sage: {
                            50: '#f4f6f2',
                            100: '#e6ebe1',
                            200: '#cdd7c3',
                            300: '#aebd9d',
                            400: '#93a67e',
                            500: '#7c8f6e',
                            600: '#63735a',
                            700: '#4f5c48',
                            800: '#414b3c',
                            900: '#374033',
                        },
                    },
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui'],
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
    @stack('head')
</head>
<body class="bg-white text-gray-700">

    <header class="bg-sage-500">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between flex-wrap gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="w-12 h-12 rounded-full bg-gray-200/80 flex-shrink-0"></span>
                <span class="text-white text-xs sm:text-sm font-semibold leading-tight uppercase">
                    PP Nur Cahaya Tarbiyatul<br>Qur'an Putra
                </span>
            </a>
            <nav class="flex items-center gap-6 text-white text-base sm:text-lg flex-wrap">
                <a href="{{ route('home') }}" class="hover:text-sage-100 {{ request()->routeIs('home') ? 'font-semibold underline underline-offset-4' : '' }}">Home</a>
                <a href="{{ route('profile') }}" class="hover:text-sage-100 {{ request()->routeIs('profile') ? 'font-semibold underline underline-offset-4' : '' }}">Profile</a>
                <a href="{{ route('artikel.index') }}" class="hover:text-sage-100 {{ request()->routeIs('artikel.*') ? 'font-semibold underline underline-offset-4' : '' }}">Artikel</a>
                <a href="{{ route('ppdb.index') }}" class="hover:text-sage-100 {{ request()->routeIs('ppdb.*') ? 'font-semibold underline underline-offset-4' : '' }}">PPDB</a>
                <a href="{{ route('kritik-saran.index') }}" class="hover:text-sage-100 {{ request()->routeIs('kritik-saran.*') ? 'font-semibold underline underline-offset-4' : '' }}">Kritik&amp;saran</a>
            </nav>
        </div>
    </header>

    <section class="relative bg-sage-500 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1519817650390-64a93db51149?q=80&w=1600&auto=format&fit=crop"
                 alt="Masjid" class="w-full h-full object-cover opacity-60 mix-blend-multiply">
            <div class="absolute inset-0 bg-gradient-to-r from-sage-600/90 via-sage-500/60 to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-6 py-16 sm:py-20">
            <h1 class="text-3xl sm:text-5xl text-white font-medium">{{ \App\Models\Setting::get('hero_title_1', "Membentuk Generasi Qur'ani") }}</h1>
            <h2 class="text-xl sm:text-2xl text-white font-light mt-1">{{ \App\Models\Setting::get('hero_title_2', 'Berilmu Dan Berakhlak Mulia') }}</h2>
            <div class="w-16 h-0.5 bg-white my-5"></div>
            <p class="text-white/90 max-w-md text-sm leading-relaxed">
                {{ \Illuminate\Support\Str::limit(\App\Models\Setting::get('hero_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'), 220) }}
            </p>
            <a href="{{ route('profile') }}" class="inline-block mt-6 px-6 py-2.5 rounded-md border border-white text-white text-sm hover:bg-white hover:text-sage-600 transition">
                Selengkapnya
            </a>
        </div>
    </section>

    <main>
        @if (session('success'))
            <div class="max-w-4xl mx-auto mt-6 px-6">
                <div class="bg-sage-100 border border-sage-300 text-sage-800 rounded-lg px-5 py-3 text-sm">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-sage-500 mt-20">
        <div class="max-w-7xl mx-auto px-6 py-10 text-center text-white/90 text-sm">
            <p class="font-medium mb-1">PP Nur Cahaya Tarbiyatul Qur'an Putra</p>
            <p>&copy; {{ date('Y') }} Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
