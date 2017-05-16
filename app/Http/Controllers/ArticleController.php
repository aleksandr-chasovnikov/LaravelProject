<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    /**
     * Создание статей
     * @param object $request
     */
    public function index()
    {
        $articles = Article::select(['id', 'title', 'description'])->get();

        // dump($articles);

        return view('page')->with(['header' => $this->header,
                    'message' => $this->message,
                    'articles' => $articles
        ]);
    }
    
    /**
     * Создание статей
     * @param object $request
     */
    public function show($id)
    {
        // $article = Article::find($id);
        $article = Article::select(['id', 'title', 'text'])->where('id', $id)->first();

        // dump($article);

        return view('article-content')->with(['header' => $this->header,
                    'message' => $this->message,
                    'article' => $article
        ]);
    }

	/**
	 * Создание статей
	 * @param object $request
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $data = $request->all();

        $post = new Article;
        $post->fill($data);

        $post->save();

        return redirect('/');
    }
}
