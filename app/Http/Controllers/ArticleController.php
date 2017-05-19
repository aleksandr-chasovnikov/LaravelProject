<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\Category;
use App\User;

class ArticleController extends Controller
{
    /**
     * Показать одну статью
     */
    public function show($id)
    {
        // $article = Article::find($id);
        $article = Article::select(['id', 'title', 'text'])
                ->where('id', $id)
                ->first();

        //Комментарии, принадлежащие статье
        $comments = Article::find($id)->comments()->get();

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();

        return view('article')->with([
            'article' => $article,
            'categories' => $categories,
            'comments' => $comments,
            ]);
    }

    /**
     * 
     */
    public function showByCategory($categoryId)
    {
        //Выбранная категория
        $category = Category::all()->where('id', $categoryId);

        //Список статей
        $articles = Article::select(['id', 'title', 'description'])
                ->where('categories_id', $categoryId)
                ->paginate(7);

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
