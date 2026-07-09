@extends('layouts.admin')
@php $title = $activity->exists ? 'Ubah Kegiatan' : 'Tambah Kegiatan'; @endphp

@section('content')
<form action="{{ $activity->exists ? route('admin.activities.update', $activity) : route('admin.activities.store') }}"
      method="POST" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-2xl p-8 max-w-2xl space-y-6">
    @csrf
    @if ($activity->exists) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="title">Judul Kegiatan</label>
        <input type="text" name="title" id="title" value="{{ old('title', $activity->title) }}"
               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('title') border-red-400 @enderror">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="event_date">Tanggal Kegiatan</label>
        <input type="date" name="event_date" id="event_date" value="{{ old('event_date', optional($activity->event_date)->format('Y-m-d')) }}"
               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="description">Deskripsi</label>
        <textarea name="description" id="description" rows="4"
                  class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('description', $activity->description) }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-800 mb-2" for="image">Foto Kegiatan</label>
        @if ($activity->image)
            <img src="{{ asset('storage/'.$activity->image) }}" class="w-40 h-28 object-cover rounded-lg mb-3">
        @endif
        <input type="file" name="image" id="image" accept="image/*" class="text-sm">
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-sage-500 hover:bg-sage-600 text-white px-8 py-2.5 rounded-xl text-sm transition">Simpan</button>
        <a href="{{ route('admin.activities.index') }}" class="px-8 py-2.5 rounded-xl text-sm border border-gray-200 text-gray-600 hover:bg-gray-50">Batal</a>
    </div>
</form>
@endsection
