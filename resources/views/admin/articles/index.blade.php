@extends('layouts.admin')
@php $title = 'Artikel'; @endphp

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Kelola artikel yang tampil di halaman publik.</p>
    <a href="{{ route('admin.articles.create') }}" class="bg-sage-500 hover:bg-sage-600 text-white text-sm px-5 py-2.5 rounded-xl transition">
        + Tambah Artikel
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left">
            <tr>
                <th class="px-6 py-3 font-medium">Judul</th>
                <th class="px-6 py-3 font-medium">Status</th>
                <th class="px-6 py-3 font-medium">Tanggal</th>
                <th class="px-6 py-3 font-medium text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr class="border-t border-gray-100">
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-900">{{ $article->title }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ \Illuminate\Support\Str::limit($article->excerpt, 60) }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <span @class([
                            'px-3 py-1 rounded-full text-xs font-medium',
                            'bg-green-100 text-green-700' => $article->is_published,
                            'bg-gray-100 text-gray-500' => ! $article->is_published,
                        ])>{{ $article->is_published ? 'Terbit' : 'Draft' }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $article->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-sage-600 hover:underline">Ubah</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-400">Belum ada artikel.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $articles->links() }}</div>
@endsection
