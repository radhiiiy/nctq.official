<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = Article::published()->orderByDesc('published_at')->paginate(6);

        return view('site.artikel-index', compact('articles'));
    }

    public function show(Article $artikel)
    {
        abort_unless($artikel->is_published, 404);

        $related = Article::published()
            ->where('id', '!=', $artikel->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('site.artikel-show', ['article' => $artikel, 'related' => $related]);
    }
}
