<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Category;
use App\Article;

class AdminArticleController extends AdminController
{
    // /**
    //  * Сработает для пользователя с именем "admin"
    //  */
    // public function __construct()
    // {
    //     $this->user('admin');
    // }

	/**
	 * 
	 */
    public function index()
    {
        // Проверка доступа
        self::checkAdmin();

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
        // Проверка доступа
        self::checkAdmin();

        // $article = Article::find($id);
        $article = Article::select(['id', 'title', 'alias', 'description', 'text', 'categories_id', 'users_id'])->where('id', $id)->first();

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
        // Проверка доступа
        self::checkAdmin();

        return view('admin/create');
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        // Проверка доступа
        self::checkAdmin();
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        $data = $request->all();
dd($data);

        $article = new Article;
        $article->fill($data);

        $article->save();

        return view('admin/create');
    }

	/**
	 * 
	 */
    public function postUpdate(Request $request)
    {
        // Проверка доступа
        self::checkAdmin();
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        $data = $request->all();

        $article = Article::select(['id', 'title', 'alias', 'description', 'text', 'categories_id', 'users_id'])->where('id', $request->id)->first();

        $article->fill($data);

        $article->save();

        return view('admin/create');
    }
}
