<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
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
        $articles = (new Article)->select()
            ->where('status', true)
            ->paginate(self::PAGINATE);

        return view('index')->with([
            'articles' => $articles,
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
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
            'tags' => $this->showTags(),
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

        $articles = $category->articles
            ->where('categories_id', $categoryId)
            ->where('status', true)
            ->paginate(self::PAGINATE);

        dd($articles);

        return view('category')->with([
            'articles' => $articles,
            'category' => $category,
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
        ]);
    }

    /**
     * Возращает статьи по тэгу
     *
     * @param $tagId
     *
     * @return $this
     */
    public function showByTag($tagId)
    {
        $tag = (new Tag)->find($tagId)->first();

        $articles = $tag->articles
            ->where('categories_id', $tagId)
            ->where('status', true)
            ->paginate(self::PAGINATE);
        dd($articles);

        return view('tag')->with([ //TODO Создать вид tag
            'articles' => $articles,
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
        ]);
    }

}
