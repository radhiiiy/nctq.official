@extends('layouts.admin')
@php $title = 'Detail Pendaftar'; @endphp

@section('content')
<a href="{{ route('admin.ppdb.index') }}" class="text-sage-600 text-sm hover:underline">&larr; Kembali</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-4">
    <div class="lg:col-span-2 bg-white border border-gray-200 rounded-2xl p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">{{ $ppdb->nama_lengkap }}</h2>
                <p class="text-sm text-gray-400">{{ $ppdb->no_pendaftaran }}</p>
            </div>
            <span @class([
                'px-4 py-1.5 rounded-full text-sm font-medium',
                'bg-yellow-100 text-yellow-700' => $ppdb->status === 'pending',
                'bg-green-100 text-green-700' => $ppdb->status === 'diterima',
                'bg-red-100 text-red-700' => $ppdb->status === 'ditolak',
            ])>{{ ucfirst($ppdb->status) }}</span>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
            <div><dt class="text-gray-400">Jenis Kelamin</dt><dd class="font-medium text-gray-800">{{ $ppdb->jenis_kelamin }}</dd></div>
            <div><dt class="text-gray-400">Tempat, Tanggal Lahir</dt><dd class="font-medium text-gray-800">{{ $ppdb->tempat_lahir ?: '-' }}, {{ optional($ppdb->tanggal_lahir)->translatedFormat('d F Y') ?? '-' }}</dd></div>
            <div><dt class="text-gray-400">Nama Ayah</dt><dd class="font-medium text-gray-800">{{ $ppdb->nama_ayah ?: '-' }}</dd></div>
            <div><dt class="text-gray-400">Nama Ibu</dt><dd class="font-medium text-gray-800">{{ $ppdb->nama_ibu ?: '-' }}</dd></div>
            <div><dt class="text-gray-400">No. HP</dt><dd class="font-medium text-gray-800">{{ $ppdb->no_hp }}</dd></div>
            <div><dt class="text-gray-400">Email</dt><dd class="font-medium text-gray-800">{{ $ppdb->email ?: '-' }}</dd></div>
            <div><dt class="text-gray-400">Asal Sekolah</dt><dd class="font-medium text-gray-800">{{ $ppdb->asal_sekolah ?: '-' }}</dd></div>
            <div><dt class="text-gray-400">Program</dt><dd class="font-medium text-gray-800">{{ $ppdb->program ?: '-' }}</dd></div>
            <div class="sm:col-span-2"><dt class="text-gray-400">Alamat</dt><dd class="font-medium text-gray-800">{{ $ppdb->alamat }}</dd></div>
            <div class="sm:col-span-2"><dt class="text-gray-400">Tanggal Daftar</dt><dd class="font-medium text-gray-800">{{ $ppdb->created_at->translatedFormat('d F Y H:i') }}</dd></div>
        </dl>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-8">
        <h3 class="font-semibold text-gray-900 mb-4">Ubah Status</h3>
        <form action="{{ route('admin.ppdb.update', $ppdb) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="status">Status</label>
                <select name="status" id="status" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
                    <option value="pending" @selected($ppdb->status == 'pending')>Menunggu</option>
                    <option value="diterima" @selected($ppdb->status == 'diterima')>Diterima</option>
                    <option value="ditolak" @selected($ppdb->status == 'ditolak')>Ditolak</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="catatan_admin">Catatan Admin</label>
                <textarea name="catatan_admin" id="catatan_admin" rows="4"
                          class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('catatan_admin', $ppdb->catatan_admin) }}</textarea>
            </div>
            <button type="submit" class="w-full bg-sage-500 hover:bg-sage-600 text-white py-2.5 rounded-xl text-sm transition">Simpan Perubahan</button>
        </form>

        <form action="{{ route('admin.ppdb.destroy', $ppdb) }}" method="POST" class="mt-4" onsubmit="return confirm('Hapus data pendaftar ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="w-full border border-red-200 text-red-500 py-2.5 rounded-xl text-sm hover:bg-red-50 transition">Hapus Data</button>
        </form>
    </div>
</div>
@endsection
