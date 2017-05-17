<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

abstract class AdminController extends Controller
{
    /**
     * Проверяет пользователя на наличие администароских прав
     * @return true
     */
	public static function checkAdmin()
	{
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        if (\Auth::check()) {

            // Если роль текущего пользователя "admin", пускаем его в админпанель
	        if (\Auth::user()->role == 'admin') {
	            return true;
	        }

            // Иначе завершаем работу с сообщением об закрытом доступе
        	die('Access denied / Доступ запрещён');
    	
        }      
	}

}
