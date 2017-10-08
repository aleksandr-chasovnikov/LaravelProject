<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{
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
            if (\Auth::user()->role === 'admin') {
                return true;
            }

            abort(403, 'Доступ запрещён!');

        }
    }

    /**
     * Возращает список категорий
     *
     * @return Category[] | Collection
     */
    protected function showCategories()
    {
        return (new Category)->select([
            'id',
            'name_category',
        ])->get();
    }

}
