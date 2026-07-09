@extends('layouts.admin')
@php $title = 'Dashboard'; @endphp

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <p class="text-sm text-gray-400">Total Artikel</p>
        <p class="text-3xl font-semibold text-gray-900 mt-2">{{ $stats['articles'] }}</p>
    </div>
    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <p class="text-sm text-gray-400">Total Kegiatan</p>
        <p class="text-3xl font-semibold text-gray-900 mt-2">{{ $stats['activities'] }}</p>
    </div>
    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <p class="text-sm text-gray-400">Pendaftar PPDB</p>
        <p class="text-3xl font-semibold text-gray-900 mt-2">{{ $stats['ppdb_total'] }}</p>
        <p class="text-xs text-sage-600 mt-1">{{ $stats['ppdb_pending'] }} menunggu verifikasi</p>
    </div>
    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <p class="text-sm text-gray-400">Kritik &amp; Saran</p>
        <p class="text-3xl font-semibold text-gray-900 mt-2">{{ $stats['kritik_saran'] }}</p>
        <p class="text-xs text-red-500 mt-1">{{ $stats['kritik_saran_unread'] }} belum dibaca</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-8">
    <div class="bg-white border border-gray-200 rounded-2xl p-6 text-center">
        <p class="text-sm text-gray-400 mb-2">Menunggu</p>
        <p class="text-2xl font-semibold text-yellow-500">{{ $stats['ppdb_pending'] }}</p>
    </div>
    <div class="bg-white border border-gray-200 rounded-2xl p-6 text-center">
        <p class="text-sm text-gray-400 mb-2">Diterima</p>
        <p class="text-2xl font-semibold text-green-600">{{ $stats['ppdb_diterima'] }}</p>
    </div>
    <div class="bg-white border border-gray-200 rounded-2xl p-6 text-center">
        <p class="text-sm text-gray-400 mb-2">Ditolak</p>
        <p class="text-2xl font-semibold text-red-500">{{ $stats['ppdb_ditolak'] }}</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-900">Pendaftar PPDB Terbaru</h3>
            <a href="{{ route('admin.ppdb.index') }}" class="text-sage-600 text-sm hover:underline">Lihat semua</a>
        </div>
        <div class="space-y-3">
            @forelse ($latestPpdb as $p)
                <div class="flex items-center justify-between text-sm border-b border-gray-100 pb-3 last:border-0 last:pb-0">
                    <div>
                        <p class="font-medium text-gray-800">{{ $p->nama_lengkap }}</p>
                        <p class="text-xs text-gray-400">{{ $p->no_pendaftaran }} &middot; {{ $p->created_at->diffForHumans() }}</p>
                    </div>
                    <span @class([
                        'px-3 py-1 rounded-full text-xs font-medium',
                        'bg-yellow-100 text-yellow-700' => $p->status === 'pending',
                        'bg-green-100 text-green-700' => $p->status === 'diterima',
                        'bg-red-100 text-red-700' => $p->status === 'ditolak',
                    ])>{{ ucfirst($p->status) }}</span>
                </div>
            @empty
                <p class="text-gray-400 text-sm">Belum ada pendaftar.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-900">Kritik &amp; Saran Terbaru</h3>
            <a href="{{ route('admin.kritik-saran.index') }}" class="text-sage-600 text-sm hover:underline">Lihat semua</a>
        </div>
        <div class="space-y-3">
            @forelse ($latestKritikSaran as $k)
                <div class="flex items-center justify-between text-sm border-b border-gray-100 pb-3 last:border-0 last:pb-0">
                    <div>
                        <p class="font-medium text-gray-800">{{ $k->judul }}</p>
                        <p class="text-xs text-gray-400">{{ $k->nama ?: 'Anonim' }} &middot; {{ $k->created_at->diffForHumans() }}</p>
                    </div>
                    @if (! $k->is_read)
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                    @endif
                </div>
            @empty
                <p class="text-gray-400 text-sm">Belum ada masukan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
