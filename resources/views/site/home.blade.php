@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="border border-gray-200 rounded-xl p-8 text-center hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-sage-600 mb-3">Pendidikan</h3>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
        </div>
        <div class="border border-gray-200 rounded-xl p-8 text-center hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-sage-600 mb-3">Kegiatan</h3>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
        </div>
        <div class="border border-gray-200 rounded-xl p-8 text-center hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-sage-600 mb-3">PBDB</h3>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 pb-20 grid grid-cols-1 lg:grid-cols-3 gap-10">
    <div class="lg:col-span-2">
        <h2 class="text-2xl sm:text-3xl text-sage-600 font-medium mb-6">Kegiatan Terbaru</h2>
        <div class="border border-gray-200 rounded-xl p-6">
            @forelse ($activities as $activity)
                <div class="flex gap-5 {{ !$loop->last ? 'mb-6 pb-6 border-b border-gray-100' : '' }}">
                    <div class="w-32 h-24 rounded-lg bg-gray-200 flex-shrink-0 overflow-hidden">
                        @if ($activity->image)
                            <img src="{{ asset('storage/'.$activity->image) }}" class="w-full h-full object-cover" alt="{{ $activity->title }}">
                        @endif
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-sage-600">{{ $activity->title }}</h3>
                        <p class="text-xs text-gray-400 mt-2">{{ optional($activity->event_date)->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 text-sm">Belum ada kegiatan yang dipublikasikan.</p>
            @endforelse

            <a href="{{ route('artikel.index') }}" class="inline-block mt-4 text-sage-600 font-medium hover:underline">Lihat Selengkapnya</a>
        </div>
    </div>

    <div>
        <h2 class="text-2xl sm:text-3xl text-sage-600 font-medium mb-6">Sambutan Pengasuh</h2>
        <div class="border border-gray-200 rounded-xl p-8 text-center h-full">
            <div class="w-28 h-28 rounded-full bg-gray-200 mx-auto mb-5 overflow-hidden">
                @if ($settings['sambutan_foto'])
                    <img src="{{ asset('storage/'.$settings['sambutan_foto']) }}" class="w-full h-full object-cover" alt="Pengasuh">
                @endif
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $settings['sambutan_nama'] }}</h3>
            <p class="text-sm text-gray-500 leading-relaxed">{{ $settings['sambutan_isi'] }}</p>
        </div>
    </div>
</div>
@endsection
