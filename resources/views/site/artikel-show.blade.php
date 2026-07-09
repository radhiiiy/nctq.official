@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-16">
    <a href="{{ route('artikel.index') }}" class="text-sage-600 text-sm hover:underline">&larr; Kembali ke Artikel</a>

    <h1 class="text-3xl sm:text-4xl font-medium text-gray-900 mt-4 mb-2">{{ $article->title }}</h1>
    <p class="text-xs text-gray-400 mb-8">{{ optional($article->published_at)->translatedFormat('d F Y') }}</p>

    <div class="w-full h-72 rounded-xl bg-gray-200 overflow-hidden mb-8">
        @if ($article->image)
            <img src="{{ asset('storage/'.$article->image) }}" class="w-full h-full object-cover" alt="{{ $article->title }}">
        @endif
    </div>

    <div class="prose max-w-none text-gray-600 leading-relaxed whitespace-pre-line">{{ $article->content }}</div>
</div>

@if ($related->isNotEmpty())
<div class="max-w-5xl mx-auto px-6 pb-16">
    <h2 class="text-2xl font-medium text-gray-900 mb-6">Artikel Lainnya</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @foreach ($related as $item)
            <a href="{{ route('artikel.show', $item) }}" class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition block">
                <div class="h-32 bg-gray-200">
                    @if ($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-medium text-gray-900 text-sm">{{ $item->title }}</h3>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif
@endsection
