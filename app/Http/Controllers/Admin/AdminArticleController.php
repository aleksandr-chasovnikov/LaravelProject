<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class AdminArticleController extends AdminController
{
    /**
     * Показывает все статьи в админ панели
     *
     * GET /admin/article/index
     *
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        $articles = (new Article)->select([
            'id',
            'title',
            'description',
            'created_at',
        ])->get();

        $c = (new Category)->select([
            'id',
            'name_category',
        ])->get();

        return view('admin/index')->with([
            'articles' => $articles,
            'categories' => $c,
        ]);
    }

    /**
     * Выводит форму для создания статьи
     *
     * GET /admin/article/create
     *
     * @return View
     */
    public function create()
    {
        self::checkAdmin();

        return view('admin/create')->with([
            'categories' => self::showCategories(),
            'message' => false,
        ]);
    }

    /**
     * Сохраняет статью и выводит форму с сообщением об успешной операции
     *
     * POST /admin/article/store
     *
     * @param Request $request
     *
     * @return $this
     */
    public function store(Request $request)
    {
        self::checkAdmin();

        $this->validate($request, [
            'title' => 'required|max:255',
//            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        (new Article)->create($request->all());

        return view('admin/create')->with([
            'categories' => self::showCategories(),
            'message' => 'Статья успешно создана.',
        ]);
    }

    /**
     * Выводит форму для редактирования статьи
     *
     * GET /admin/article/edit
     *
     * @var int $id
     *
     * @return View
     */
    public function edit($id)
    {
        self::checkAdmin();

        $article = (new Article)->find($id)
            ->first();

        return view('admin/update')->with([
            'article' => $article,
            'categories' => self::showCategories(),
        ]);
    }

    /**
     * Редактирует статью и выводит форму с сообщением об успешной операции
     *
     * POST /admin/article/update
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        self::checkAdmin();

        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        (new Article())->find($request->id)
            ->update($request->all());

        return redirect()->back();
    }

    /**
     * Удаляет статью
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        (new Article)->where('id', $id)
            ->first()
            ->delete();

        return redirect()->back();
    }

    /**
     * Загружает файл
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadFile(Request $request)
    {
        //TODO пересмотреть метод
        if ($request->hasFile('file')) {

            $filename = $request->file->getClientOriginalName();
            $request->file->move('uploads', $filename);
        } else {

            // $filename = false;
            return redirect()->back()
                ->with('message', 'Ошибка!');
        }

        $id = $request->id;

        DB::table('articles')
            ->where('id', $id)
            ->update(['img' => $filename]);

        return redirect()->back()
            ->with('message', 'Готово!');
    }
}
