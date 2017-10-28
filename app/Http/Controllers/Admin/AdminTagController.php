<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Comment;
use App\Tag;

class AdminTagController extends BaseController
{
	/**
	 * Показать все теги
	 */
     public function index()
     {
         self::checkAdmin();

         $tags = Tag::select()
             ->orderBy('title')
             ->get();

         return view('admin/index')->with([
                     'tags' => $tags
         ]);
     }

    /**
     * Выводит форму для создания статьи
     *
     * GET /admin/article/create
     *
     * @return View | HttpException
     */
    public function create()
    {
        self::checkAdmin();

        return view('admin/tag/create');
    }

    /**
     * Сохраняет статью и выводит форму с сообщением об успешной операции
     *
     * POST /admin/article/store
     *
     * @param Request $request
     *
     * @return $this | HttpException
     */
    public function store(Request $request)
    {
        self::checkAdmin();

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Article::create($request->all());

        return view('admin/create')->with([
            'categories' => $this->showCategories(),
            'message' => 'Статья успешно создана.',
        ]);
    }

    /**
     * Выводит форму для редактирования статьи
     *
     * GET /admin/article/edit/{id}
     *
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        self::checkAdmin();

        $article = Article::find($id)->first();

        return view('admin/update')->with([
            'article' => $article,
            'categories' => $this->showCategories(),
        ]);
    }

    /**
     * Редактирует статью
     *
     * POST /admin/article/update
     *
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function update(Request $request)
    {
        self::checkAdmin();

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Article::find($request->id)
            ->update($request->all());

        return redirect()->back();
    }

    /**
     * Удаляет статью
     *
     * DELETE /admin/article/delete/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        self::checkAdmin();

        Article::find($id)
            ->first()
            ->delete();

        return redirect()->back();
    }
}

