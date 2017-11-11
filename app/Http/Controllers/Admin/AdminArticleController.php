<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminArticleController extends BaseController
{
    /**
     * Показывает все статьи в админ панели
     *
     * GET /admin/article/index
     *
     * @return View | HttpException
     */
    public function index()
    {
        self::checkAdmin();

        $articles = Article::withTrashed()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.index')->with([
            'articles' => $articles,
            'categories' => $this->showCategories(),
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

        return view('admin.article.create')->with([
            'categories' => $this->showCategories(),
        ]);
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

        return view('admin.create')->with([
            'categories' => $this->showCategories(),
            'message' => 'Статья успешно создана.',
        ]);
    }

    /**
     * Выводит форму для редактирования статьи
     *
     * GET /admin/article/update.{id}
     *
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        self::checkAdmin();

        $article = Article::withTrashed()
            ->where('id', $id)
            ->first();

        return view('admin.article.update')->with([
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
        ]);

        Article::withTrashed()
            ->where('id', $request->id)
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

        Article::find($id)->delete();

        return redirect()->back();
    }

    /**
     * Восстанавливает категорию
     *
     * GET /admin/category/restore/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function restore($id)
    {
        self::checkAdmin();

        Article::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back();
    }

}
