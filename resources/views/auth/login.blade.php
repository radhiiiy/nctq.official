<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { sage: {
            50: '#f4f6f2', 100: '#e6ebe1', 200: '#cdd7c3', 300: '#aebd9d', 400: '#93a67e',
            500: '#7c8f6e', 600: '#63735a', 700: '#4f5c48', 800: '#414b3c', 900: '#374033',
        } } }, fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'system-ui'] } } }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-sage-50 min-h-screen flex items-center justify-center px-6">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <span class="w-16 h-16 rounded-full bg-sage-200 inline-block mb-4"></span>
            <h1 class="text-xl font-semibold text-gray-900">PP Nur Cahaya Tarbiyatul Qur'an Putra</h1>
            <p class="text-sm text-gray-500 mt-1">Portal Admin</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3 mb-5">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.attempt') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2" for="password">Kata Sandi</label>
                    <input type="password" name="password" id="password" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
                </div>
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Ingat saya
                </label>
                <button type="submit" class="w-full bg-sage-500 hover:bg-sage-600 text-white py-2.5 rounded-xl font-medium transition">
                    Masuk
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            <a href="{{ route('home') }}" class="hover:underline">&larr; Kembali ke situs</a>
        </p>
    </div>
</body>
</html>
