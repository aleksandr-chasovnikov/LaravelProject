<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
	/**
	 * Показать все комментарии
	 */
    public function index()
    {
        $articles = Comment::select(['id', 'title', 'description'])->get();

        // dump($articles);

        return view('admin/index')->with([
                    'articles' => $articles
        ]);
    }

	/**
	 * Редактировать комментарий
	 */
    public function update($id)
    {
        // $article = Comment::find($id);
        $article = Comment::select(['id', 'title', 'text'])->where('id', $id)->first();

        // dump($article);

        return view('admin/update')->with([
                    'article' => $article
        ]);
    }

	/**
	 * Создать комментарий
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

