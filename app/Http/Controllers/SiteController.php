<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class SiteController extends BaseController
{
    /**
     * Показывает все статьи
     *
     * @return View
     */
    public function index()
    {
        $articles = $this->showAllArticles();

        return view('index')->with([
            'articles' => $articles->paginate(self::PAGINATE),
            'popular' => $this->showPopularArticles($articles),
            'recent' => $this->showRecentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
        ]);
    }

    /**
     * Показывает одну статью
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
        $articles = $this->showAllArticles();

        $article = $articles->where('id', $id)->first();

        return view('article')->with([
            'article' => $article,
            'popular' => $this->showPopularArticles($articles),
            'recent' => $this->showRecentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
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

        $articles = $this->showAllArticles(null, $categoryId);

        return view('index')->with([
            'articles' => $articles->paginate(self::PAGINATE),
            'category' => $category,
            'popular' => $this->showPopularArticles($articles),
            'recent' => $this->showRecentArticles($articles),
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

        $articles = $this->showAllArticles($tagId);

        return view('index')->with([
            'articles' => $articles->paginate(self::PAGINATE),
            'tag' => $tag,
            'popular' => $this->showPopularArticles($articles),
            'recent' => $this->showRecentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
        ]);
    }

}
