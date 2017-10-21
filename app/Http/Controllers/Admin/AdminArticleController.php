<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;
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

        $articles = (new Article)->select([
            'id',
            'title',
            'description',
//            'keywords',
//            'meta_desc',
            'created_at',
        ])->orderBy('created_at', 'desc')
            ->where('status', true)
            ->get();

        return view('admin/index')->with([
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

        return view('admin/create')->with([
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

        (new Article)->create($request->all());

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

        $article = (new Article)->find($id)
            ->first();

        return view('admin/update')->with([
            'article' => $article,
            'categories' => $this->showCategories(),
        ]);
    }

    /**
     * Редактирует статью и выводит форму с сообщением об успешной операции
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

        (new Article())->find($request->id)
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
     * @return RedirectResponse | HttpException
     */
    public function uploadFile(Request $request)
    {
        self::checkAdmin();

        //TODO пересмотреть метод
        if ($request->hasFile('file')) {
//
//            try{
//                $filename = $request->file;
//
//                /**
//                 * @var ?
//                 */
//                $request->file->move('uploads', $filename->getClientOriginalName());
//            } catch ($exception \Exception) {
//
//            }

        } else {

            return redirect()->back()
                ->with('message', 'Ошибка!');
        }

        DB::table('articles')
            ->where('id', $request->id)
            ->update(['img' => $filename]);

        return redirect()->back()
            ->with('message', 'Готово!');
    }
}
