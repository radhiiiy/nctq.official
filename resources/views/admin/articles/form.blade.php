@extends('layouts.admin')
@php $title = $article->exists ? 'Ubah Artikel' : 'Tambah Artikel'; @endphp

@section('content')
<form action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
      method="POST" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-2xl p-8 max-w-3xl space-y-6">
    @csrf
    @if ($article->exists) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="title">Judul</label>
        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('title') border-red-400 @enderror">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="excerpt">Ringkasan</label>
        <textarea name="excerpt" id="excerpt" rows="2"
                  class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('excerpt', $article->excerpt) }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="content">Isi Artikel</label>
        <textarea name="content" id="content" rows="10"
                  class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('content') border-red-400 @enderror">{{ old('content', $article->content) }}</textarea>
        @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="image">Gambar Sampul</label>
        @if ($article->image)
            <img src="{{ asset('storage/'.$article->image) }}" class="w-40 h-28 object-cover rounded-lg mb-3">
        @endif
        <input type="file" name="image" id="image" accept="image/*" class="text-sm">
    </div>

    <label class="flex items-center gap-2 text-sm text-gray-700">
        <input type="checkbox" name="is_published" value="1" class="rounded border-gray-300" {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
        Terbitkan artikel ini
    </label>

    <div class="flex gap-3">
        <button type="submit" class="bg-sage-500 hover:bg-sage-600 text-white px-8 py-2.5 rounded-xl text-sm transition">Simpan</button>
        <a href="{{ route('admin.articles.index') }}" class="px-8 py-2.5 rounded-xl text-sm border border-gray-200 text-gray-600 hover:bg-gray-50">Batal</a>
    </div>
</form>
@endsection
