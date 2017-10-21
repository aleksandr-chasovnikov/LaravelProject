<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseController extends Controller
{
    /**
     * Количество статей на странице
     */
    const PAGINATE = 2; //TODO Создать AdminProfileController для настройки админ-панели из браузера

    /**
     * Проверяет пользователя на наличие администраторских прав
     *
     * @return true
     *
     * @throws HttpException
     */
    public static function checkAdmin()
    {
        if (\Auth::check() && isAdmin()) {
            return true;
        }

        abort(403, 'Доступ запрещён!');
    }

    /**
     * Возращает список категорий
     *
     * @return Category[] | Collection
     */
    protected function showCategories()
    {
        return Category::select(['id', 'title'])
            ->orderBy('title')
            ->where('status', true)
            ->get();
    }

    /**
     * Возращает список тегов
     *
     * @return Tag[] | Collection
     */
    protected function showTags()
    {
        return Tag::select()
            ->orderBy('title')
            ->where('status', true)
            ->get();
    }

    /**
     * Возращает список статей разрешенных к показу
     *
     * @param string $tagId
     * @param string $categoryId
     *
     * @return Builder
     */
    protected function showAllArticles($tagId = null, $categoryId = null)
    {
        $articles = Article::select()
            ->where('status', true);

        if (!empty($categoryId)) {
            $articles = $articles->where('categories_id', $categoryId);
        }

        if (!empty($tagId)) {
            $articles = $articles->whereHas('tags', function(Builder $builder) use ($tagId) {
                $builder->where('tag_id', $tagId);
            });
        }

        return $articles;
    }

    /**
     * Возращает три последние статьи
     *
     * @param Builder $articles
     *
     * @return Article[] | Collection
     */
    protected function showRecentArticles(Builder $articles)
    {
        return $articles->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    /**
     * Возращает три самые популярные статьи
     *
     * @param Builder $articles
     *
     * @return Article[] | Collection
     */
    protected function showPopularArticles(Builder $articles)
    {
        return $articles->orderBy('viewed', 'desc')
            ->limit(3)
            ->get();
    }

}
