<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SiteController extends Controller
{
	public function index()
	{
        $articles = Article::select(['id', 'title', 'description'])->get();

        // dump($articles);

        return view('index')->with(['articles' => $articles]);
	}

    public function show($id)
    {
        // $article = Article::find($id);
        $article = Article::select(['id', 'title', 'text'])->where('id', $id)->first();

        // dump($article);

        return view('article')->with(['article' => $article]);
    }
}
