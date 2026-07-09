@extends('layouts.admin')
@php $title = 'Detail Kritik & Saran'; @endphp

@section('content')
<a href="{{ route('admin.kritik-saran.index') }}" class="text-sage-600 text-sm hover:underline">&larr; Kembali</a>

<div class="bg-white border border-gray-200 rounded-2xl p-8 mt-4 max-w-2xl">
    <h2 class="text-xl font-semibold text-gray-900 mb-1">{{ $item->judul }}</h2>
    <p class="text-sm text-gray-400 mb-6">
        Dari: {{ $item->nama ?: 'Anonim' }} &middot; {{ $item->created_at->translatedFormat('d F Y H:i') }}
    </p>
    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $item->deskripsi }}</p>

    <form action="{{ route('admin.kritik-saran.destroy', $item) }}" method="POST" class="mt-8" onsubmit="return confirm('Hapus masukan ini?')">
        @csrf @method('DELETE')
        <button type="submit" class="border border-red-200 text-red-500 px-6 py-2.5 rounded-xl text-sm hover:bg-red-50 transition">Hapus Data</button>
    </form>
</div>
@endsection
