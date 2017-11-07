<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends BaseController
{
    /**
     * Показать все комментарии
     */
     public function index()
     {
         // Проверка доступа
         self::checkAdmin();

         $articles = Comment::select(['id', 'title', 'description'])->get();

         // dump($articles);

         return view('admin/index')->with([
                     'articles' => $articles
         ]);
     }

    /**
     * Редактировать комментарий
     *
     * @param $id
     *
     * @return $this
     */
    public function update($id)
    {
//        self::checkAdmin();
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

    /**
     * Сохранить комментарий
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        Article::find($request->input('target_id'))
            ->comments()
            ->save(new Comment([
                'content' => $request->input('content'),
                'user_id' => $request->input('user_id'),
            ]));

//        Comment::create($request->all());

        return redirect()->back();
    }

    /**
     * Удалить комментарий
     *
     * @param $commentId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($commentId)
    {
        Comment::where('id', $commentId)
            ->first()
            ->delete();

        return redirect()->back();
    }
}

