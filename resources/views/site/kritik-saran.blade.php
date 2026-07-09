@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-4xl sm:text-5xl text-sage-500 font-medium">Kritik &amp; Saran</h2>
        <div class="w-24 h-0.5 bg-sage-400 mx-auto mt-4"></div>
    </div>

    <h3 class="text-xl sm:text-2xl text-sage-500 font-medium mb-6">Sampaikan Kritik Dan Saran Anda</h3>

    <form action="{{ route('kritik-saran.store') }}" method="POST" class="border border-gray-300 rounded-2xl p-8 sm:p-10">
        @csrf

        <div class="mb-6">
            <label class="sr-only" for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Nama (opsional)"
                   class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
        </div>

        <div class="mb-6">
            <label class="sr-only" for="judul">Kritik</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" placeholder="Kritik"
                   class="w-full border border-gray-200 rounded-xl px-5 py-3 font-medium focus:outline-none focus:ring-2 focus:ring-sage-300 @error('judul') border-red-400 @enderror">
            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-2">
            <label for="deskripsi" class="block text-sm font-medium text-gray-800 mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="6" placeholder="Deskripsi...."
                      class="w-full border border-gray-200 rounded-xl px-5 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('deskripsi') border-red-400 @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit" class="bg-sage-500 hover:bg-sage-600 text-white px-10 py-3 rounded-xl font-medium transition">
                Kirim
            </button>
        </div>
    </form>

    <div class="text-center mt-16">
        <p class="text-lg sm:text-xl text-sage-500 font-medium">
            Gunakan Bahasa Yang Baik Dan Sopan<br>Sebagai Bentuk Etika Digital
        </p>
        <div class="w-64 h-px bg-sage-300 mx-auto mt-6"></div>
    </div>
</div>
@endsection
