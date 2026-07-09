@extends('layouts.admin')
@php $title = 'Kegiatan'; @endphp

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Kelola kegiatan terbaru yang tampil di halaman beranda.</p>
    <a href="{{ route('admin.activities.create') }}" class="bg-sage-500 hover:bg-sage-600 text-white text-sm px-5 py-2.5 rounded-xl transition">
        + Tambah Kegiatan
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left">
            <tr>
                <th class="px-6 py-3 font-medium">Judul</th>
                <th class="px-6 py-3 font-medium">Tanggal Kegiatan</th>
                <th class="px-6 py-3 font-medium text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activities as $activity)
                <tr class="border-t border-gray-100">
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-900">{{ $activity->title }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ \Illuminate\Support\Str::limit($activity->description, 60) }}</p>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ optional($activity->event_date)->translatedFormat('d F Y') ?? '-' }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.activities.edit', $activity) }}" class="text-sage-600 hover:underline">Ubah</a>
                        <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kegiatan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="px-6 py-8 text-center text-gray-400">Belum ada kegiatan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $activities->links() }}</div>
@endsection
