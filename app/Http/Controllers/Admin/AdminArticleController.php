<?php

namespace App\Http\Controllers\Admin;

use App\File;
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

        $articles = $this->allArticles()->get();

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

        Article::create($request->all());

        return view('admin/create')->with([
            'categories' => $this->showCategories(),
            'message' => 'Статья успешно создана.',
        ]);
    }

    /**
     * Выводит форму для редактирования статьи
     *
     * GET /admin/article/update/{id}
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

    /**
     * Загружает файл
     *
     * @param Request $request
     *
     * @return false|string
     */
    public function uploadFile(Request $request)
    {
        self::checkAdmin();

        $path = $request->file('file')
            ->store('upload');

        Article::find($request->id)
            ->first()
            ->files()
            ->save(new File([
                'path' => $path,
            ]));

        //TODO пересмотреть метод
//        if ($request->hasFile('file')) {
//            try{
//                $filename = $request->file;
//
//                /**
//                 * @var ?
//                 */
//                $request->file->move('uploads', $filename->getClientOriginalName());
//            } catch (\Exception $exception) {
//                echo 'Не удалось загрузить файл!';
//            }
//
//        } else {
//            return redirect()->back()
//                ->with('message', 'Ошибка!');
//        }
//
//        Article::find($request->id)
//            ->first()
//            ->files()
//            ->save(new File([
//                'path' => $request->file,
//            ]));

        return redirect()->back()
            ->with('message', 'Готово!');
    }
}
