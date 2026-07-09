@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-16">
    <div class="text-center mb-14">
        <h2 class="text-4xl sm:text-5xl text-sage-500 font-medium">Artikel</h2>
        <div class="w-24 h-0.5 bg-sage-400 mx-auto mt-4"></div>
    </div>

    <div class="space-y-10">
        @forelse ($articles as $article)
            <div class="flex flex-col sm:flex-row gap-8 items-center">
                <div class="w-full sm:w-72 h-48 rounded-xl bg-gray-200 flex-shrink-0 overflow-hidden">
                    @if ($article->image)
                        <img src="{{ asset('storage/'.$article->image) }}" class="w-full h-full object-cover" alt="{{ $article->title }}">
                    @endif
                </div>
                <div>
                    <h3 class="text-2xl font-medium text-gray-900 mb-3">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-5">{{ $article->excerpt }}</p>
                    <a href="{{ route('artikel.show', $article) }}" class="inline-block bg-sage-500 text-white px-6 py-2.5 rounded-lg text-sm hover:bg-sage-600 transition">
                        Selengkapnya
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-400">Belum ada artikel yang dipublikasikan.</p>
        @endforelse
    </div>

    <div class="mt-14">
        {{ $articles->links() }}
    </div>
</div>
@endsection
