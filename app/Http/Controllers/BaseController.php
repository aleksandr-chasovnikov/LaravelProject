<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
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
        return (new Category)->select(['id', 'title'])
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
        return (new Tag)->select()
            ->orderBy('title')
            ->where('status', true)
            ->get();
    }

}
