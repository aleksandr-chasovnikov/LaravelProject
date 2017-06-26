<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class SiteController extends Controller
{
    /**
     * Количество статей на странице
     */
    const PAGINATE = 5;
    /**
     * Показать все статьи
     */
	public function index()
	{
        //Список статей
        $articles = Article::select(['id', 'title', 'img', 'description', 'created_at'])->paginate(self::PAGINATE);

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();

        return view('index')->with(['articles' => $articles, 
                                    'categories' => $categories,
                                    ]);
	}

    /**
     * Показать одну статью
     */
    public function show($id)
    {
        $article = Article::select(['id', 'title', 'img', 'text', 'created_at'])
                ->where('id', $id)
                ->first();

        //Комментарии, принадлежащие статье
        $comments = Article::find($id)->comments()->get();

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();

        return view('article')->with(['article' => $article, 
                                    'categories' => $categories,
                                    'comments' => $comments,
                                    ]);
    }

    /**
     * Показать статьи по категории
     */
    public function showByCategory($categoryId)
    {
        //Выбранная категория
        $category = Category::all()->where('id', $categoryId);

        //Список статей
        $articles = Article::select(['id', 'title', 'img', 'description', 'created_at'])
                ->where('categories_id', $categoryId)
                ->paginate(self::PAGINATE);

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();
        // dd($categories);

        return view('index')->with([
            'articles' => $articles,
            'category' => $category,
            'categories' => $categories
            ]);
    }

}
