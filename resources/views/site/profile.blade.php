@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-3xl sm:text-4xl font-medium text-gray-900 mb-8">Sejarah Pondok</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
        <div class="space-y-4 text-gray-600 leading-relaxed text-sm sm:text-base">
            <p>{{ $settings['sejarah_teks_1'] }}</p>
            <p>{{ $settings['sejarah_teks_2'] }}</p>
        </div>
        <div class="w-full h-64 sm:h-80 rounded-xl bg-gray-200 overflow-hidden">
            @if ($settings['sejarah_foto'])
                <img src="{{ asset('storage/'.$settings['sejarah_foto']) }}" class="w-full h-full object-cover" alt="Sejarah Pondok">
            @endif
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 pb-10">
    <h2 class="text-3xl sm:text-4xl font-medium text-gray-900 mb-6">Visi &amp; Misi</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="border border-gray-200 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Visi</h3>
            <p class="text-sm text-gray-600 leading-relaxed">{{ $settings['visi'] }}</p>
        </div>
        <div class="border border-gray-200 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Misi</h3>
            <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $settings['misi'] }}</p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
    <div>
        <h4 class="font-semibold text-gray-900 mb-1">Tahun Berdiri</h4>
        <p class="text-2xl">{{ $settings['tahun_berdiri'] }}</p>
    </div>
    <div>
        <h4 class="font-semibold text-gray-900 mb-1">Santri Aktif</h4>
        <p class="text-2xl">{{ $settings['santri_aktif'] }}</p>
    </div>
    <div>
        <h4 class="font-semibold text-gray-900 mb-1">Dewan Guru</h4>
        <p class="text-2xl">{{ $settings['dewan_guru'] }}</p>
    </div>
</div>
@endsection
