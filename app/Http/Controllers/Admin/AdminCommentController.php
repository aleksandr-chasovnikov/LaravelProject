<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Comment;


class AdminCommentController extends BaseController
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
     *
     * @param $id
     *
     * @return $this
     */
    public function update($id)
    {
        self::checkAdmin();
//TODO Доделать редактирование комментов
        $comment = (new Comment)->select([
            'id',
            'title',
            'text'
        ])
            ->where('id', $id)
            ->where('status', true)
            ->first();

        return view('admin/update')->with([
                    'article' => $comment
        ]);
    }

}

