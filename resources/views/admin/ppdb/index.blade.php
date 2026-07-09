@extends('layouts.admin')
@php $title = 'Pendaftar PPDB'; @endphp

@section('content')
<form method="GET" class="flex flex-wrap gap-3 mb-6">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama / no. pendaftaran / no. HP"
           class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm flex-1 min-w-[240px] focus:outline-none focus:ring-2 focus:ring-sage-300">
    <select name="status" class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
        <option value="">Semua Status</option>
        <option value="pending" @selected(request('status') == 'pending')>Menunggu</option>
        <option value="diterima" @selected(request('status') == 'diterima')>Diterima</option>
        <option value="ditolak" @selected(request('status') == 'ditolak')>Ditolak</option>
    </select>
    <button type="submit" class="bg-sage-500 hover:bg-sage-600 text-white px-6 py-2.5 rounded-xl text-sm transition">Filter</button>
    <a href="{{ route('admin.ppdb.index') }}" class="px-6 py-2.5 rounded-xl text-sm border border-gray-200 text-gray-600 hover:bg-gray-50">Reset</a>
</form>

<div class="bg-white border border-gray-200 rounded-2xl overflow-hidden overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left">
            <tr>
                <th class="px-6 py-3 font-medium">No. Pendaftaran</th>
                <th class="px-6 py-3 font-medium">Nama</th>
                <th class="px-6 py-3 font-medium">No. HP</th>
                <th class="px-6 py-3 font-medium">Program</th>
                <th class="px-6 py-3 font-medium">Status</th>
                <th class="px-6 py-3 font-medium">Tanggal Daftar</th>
                <th class="px-6 py-3 font-medium text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ppdbs as $p)
                <tr class="border-t border-gray-100">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $p->no_pendaftaran }}</td>
                    <td class="px-6 py-4">{{ $p->nama_lengkap }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $p->no_hp }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $p->program ?: '-' }}</td>
                    <td class="px-6 py-4">
                        <span @class([
                            'px-3 py-1 rounded-full text-xs font-medium',
                            'bg-yellow-100 text-yellow-700' => $p->status === 'pending',
                            'bg-green-100 text-green-700' => $p->status === 'diterima',
                            'bg-red-100 text-red-700' => $p->status === 'ditolak',
                        ])>{{ ucfirst($p->status) }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $p->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.ppdb.show', $p) }}" class="text-sage-600 hover:underline">Detail</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="px-6 py-8 text-center text-gray-400">Belum ada pendaftar.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $ppdbs->links() }}</div>
@endsection
