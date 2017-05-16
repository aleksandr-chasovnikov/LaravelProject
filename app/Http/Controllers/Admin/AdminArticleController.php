<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class AdminArticleController extends Controller
{
	/**
	 * 
	 */
    public function index()
    {
        $articles = Article::select(['id', 'title', 'description'])->get();

        // dump($articles);

        return view('admin/index')->with([
                    'articles' => $articles
        ]);
    }

	/**
	 * 
	 */
    public function update($id)
    {
        // $article = Article::find($id);
        $article = Article::select(['id', 'title', 'text'])->where('id', $id)->first();

        // dump($article);

        return view('admin/update')->with([
                    'article' => $article
        ]);
    }

	/**
	 * 
	 */
    public function create()
    {
        return view('admin/create');
    }

	/**
	 * 
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        $data = $request->all();

        $article = new Article;
        $article->fill($data);

        $article->save();

        return redirect('admin/index');
    }
}
