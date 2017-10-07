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
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        $articles = Article::select([
            'id',
            'title',
            'description',
            'created_at',
        ])->get();

        $categories = Category::select([
            'id',
            'name_category',
        ])->get();

        return view('admin/index')->with([
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

    /**
     * @var int $id
     *
     * @return View
     */
    public function update($id)
    {
        self::checkAdmin();

        $article = Article::find($id)->first();

        $categories = Category::select([
            'id',
            'name_category',
        ])->get();

        return view('admin/update')->with([
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    /**
     * Выводит форму для создания статьи
     *
     * @return View
     */
    public function create()
    {
        self::checkAdmin();

        $categories = Category::select([
            'id',
            'name_category',
        ])->get();

        return view('admin/create')->with([
            'categories' => $categories,
            'message' => false,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return $this
     */
    public function store(Request $request)
    {
        self::checkAdmin();

        $categories = Category::select(['id', 'name_category'])->get();

        $this->validate($request, [
            'title' => 'required|max:255',
//            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        $data = $request->all();

        (new Article)->fill($data)
            ->save();

        return view('admin/create')->with([
            'categories' => $categories,
            'message' => 'Статья успешно создана.',
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(Request $request)
    {
        self::checkAdmin();

        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $data = $request->all();

        /**
         * @var Article $article
         */
        $article = Article::select([
            'id',
            'title',
            'alias',
            'description',
            'text',
            'categories_id',
            'users_id'
        ])->where('id', $request->id)->first();

        $article->fill($data);

        $article->save();

        return redirect()->back();
    }

    /**
     * Удаляет статью
     *
     * @param $article
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($article)
    {
        /**
         * @var Article $article_tmp
         */
        $article_tmp = Article::where('id', $article)->first();
        $article_tmp->delete();

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
            $result = $request->file->move('uploads', $filename);
        } else {

            // $filename = false;
            return redirect()->back()->with('message', 'Ошибка!');
        }

        $id = $request->id;

        DB::table('articles')
            ->where('id', $id)
            ->update(['img' => $filename]);

        return redirect()->back()->with('message', 'Готово!');
    }
}
