<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::first();
        return view('article.index', compact('article'));
    }

    public function search(Request $request)
    {
        $article = Article::first();
        $keyword = $request->input('keyword');
        $count = substr_count(strtolower($article->content), strtolower($keyword));

        return view('article.index', compact('article', 'keyword', 'count'));
    }

    public function replace(Request $request)
    {
        $article = Article::first();
        $find = $request->input('find');
        $replace = $request->input('replace');
        $article->content = str_replace($find, $replace, $article->content);
        $article->save();

        return redirect()->route('article.index')->with('success', 'Kata berhasil diganti!');
    }

    public function sortWords()
    {
        $article = Article::first();
        $words = str_word_count(strtolower($article->content), 1);
        sort($words);

        return view('article.index', compact('article', 'words'));
    }
}
