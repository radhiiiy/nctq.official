@extends('layouts.admin')
@php $title = 'Kritik & Saran'; @endphp

@section('content')
<div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left">
            <tr>
                <th class="px-6 py-3 font-medium">Judul</th>
                <th class="px-6 py-3 font-medium">Nama</th>
                <th class="px-6 py-3 font-medium">Tanggal</th>
                <th class="px-6 py-3 font-medium">Status</th>
                <th class="px-6 py-3 font-medium text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="border-t border-gray-100">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $item->judul }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->nama ?: 'Anonim' }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y H:i') }}</td>
                    <td class="px-6 py-4">
                        @if ($item->is_read)
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-500">Sudah dibaca</span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Belum dibaca</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.kritik-saran.show', $item) }}" class="text-sage-600 hover:underline">Lihat</a>
                        <form action="{{ route('admin.kritik-saran.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus masukan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada kritik &amp; saran.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $items->links() }}</div>
@endsection
