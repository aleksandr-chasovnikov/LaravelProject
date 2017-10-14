<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\View\View;

class SiteController extends BaseController
{
    /**
     * Возращает все статьи
     *
     * @return View
     */
    public function index()
    {
        $articles = (new Article)->select([
            'id',
            'title',
            'description',
            'created_at',
        ])->where('status', true)
            ->paginate(self::PAGINATE);

        return view('index')->with([
            'articles' => $articles,
            'categories' => $this->showCategories(),
        ]);
    }

    /**
     * Возращает одну статью
     *
     * @param $id
     *
     * @return $this
     */
    public function show($id)
    {
        $article = (new Article)->find($id)
            ->first();

        return view('article')->with([
            'article' => $article,
            'categories' => $this->showCategories(),
            'comments' => $article->comments(),
        ]);
    }

    /**
     * Возращает статьи по категории
     *
     * @param $categoryId
     *
     * @return $this
     */
    public function showByCategory($categoryId)
    {
        $category = (new Category)->find($categoryId)->first();

        $articles = (new Article)->select([
            'id',
            'title',
            'description',
            'created_at',
        ])
            ->where('categories_id', $categoryId)
            ->where('status', true)
            ->paginate(self::PAGINATE);

        return view('category')->with([
            'articles' => $articles,
            'category' => $category,
            'categories' => $this->showCategories(),
        ]);
    }

}
