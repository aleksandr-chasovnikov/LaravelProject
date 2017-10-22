<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class SiteController extends BaseController
{
    /**
     * Показывает все статьи
     *
     * GET /
     *
     * @return View
     */
    public function index()
    {
        $articles = $this->allArticles();

        return view('index')->with([
            'articles' => $articles->paginate(self::PAGINATE),
            'popular' => $this->popularArticles($articles),
            'recent' => $this->recentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
        ]);
    }

    /**
     * Показывает одну статью
     *
     * GET /article.{id}
     *
     * @param $id
     *
     * @return $this
     */
    public function show($id)
    {
        /**
         * @var Builder $articles
         */
        $articles = $this->allArticles();

        $article = $this->allArticles()->where('id', $id)->first();

        return view('article')->with([
            'article' => $article,
            'popular' => $this->popularArticles($articles),
            'recent' => $this->recentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
            'image' => $this->showFiles($id),
        ]);
    }

    /**
     * Показывает статьи по категории
     *
     * @param $categoryId
     *
     * @return $this
     */
    public function showByCategory($categoryId)
    {
        $category = (new Category)->find($categoryId)->first(['title']);

        $articles = $this->allArticles(null, $categoryId);

        return view('index')->with([
            'articles' => $articles->paginate(self::PAGINATE),
            'category' => $category,
            'popular' => $this->popularArticles($articles),
            'recent' => $this->recentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
        ]);
    }

    /**
     * Показывает статьи по тегу
     *
     * @param $tagId
     *
     * @return $this
     */
    public function showByTag($tagId)
    {
        $tag = (new Tag)->find($tagId)->first(['title']);

        $articles = $this->allArticles($tagId);

        return view('index')->with([
            'articles' => $articles->paginate(self::PAGINATE),
            'tag' => $tag,
            'popular' => $this->popularArticles($articles),
            'recent' => $this->recentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
        ]);
    }

}
