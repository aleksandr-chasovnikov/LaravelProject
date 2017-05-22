<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

abstract class AdminController extends Controller
{
    /**
     * Проверяет пользователя на наличие администраторских прав
     * @return true
     */
	public static function checkAdmin()
	{
        // Проверяем авторизирован ли пользователь
        if (\Auth::check()) {

            // Если роль текущего пользователя "admin", разрешаем допуск
	        if (\Auth::user()->role == 'admin') {
	            return true;
	        }

        	die('Access denied / Доступ запрещён');
    	
        }      
	}

}
