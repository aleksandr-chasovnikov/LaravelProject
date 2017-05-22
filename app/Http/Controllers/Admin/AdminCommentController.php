<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Comment;
use App\Article;


class AdminCommentController extends AdminController
{
	/**
	 * Показать все комментарии
	 */
    // public function index()
    // {
    //     // Проверка доступа
    //     self::checkAdmin();

    //     $articles = Comment::select(['id', 'title', 'description'])->get();

    //     // dump($articles);

    //     return view('admin/index')->with([
    //                 'articles' => $articles
    //     ]);
    // }

	/**
	 * Редактировать комментарий
	 */
    public function update($id)
    {
        // Проверка доступа
        self::checkAdmin();

        $article = Comment::select(['id', 'title', 'text'])->where('id', $id)->first();

        return view('admin/update')->with([
                    'article' => $article
        ]);
    }

}
