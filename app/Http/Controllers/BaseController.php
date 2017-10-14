<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Database\Eloquent\Collection;

class BaseController extends Controller
{
    /**
     * Количество статей на странице
     */
    const PAGINATE = 2;

    /**
     * Проверяет пользователя на наличие администраторских прав
     *
     * @return true
     */
    public static function checkAdmin()
    {
        // Проверяем авторизирован ли пользователь
        if (\Auth::check()) {

            // Если роль текущего пользователя "admin", разрешаем допуск
            if (\Auth::user()->role !== 'admin545') {
                abort(403, 'Доступ запрещён!');
            }

            return true;
        }
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

}
