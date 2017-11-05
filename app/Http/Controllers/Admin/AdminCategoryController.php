<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminCategoryController extends BaseController
{
    //TODO Не доделаны методы данного класса
    /**
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        $categories = Category::withTrashed()
            ->orderBy('id')
            ->get();

        //TODO Не сделаны вьюхи
        return view('admin.category.index')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * @return View
     */
    public function create()
    {
        self::checkAdmin();

        return view('admin.category.create')->with([
            'categories' => self::showCategories(),
        ]);
    }

    /**
     * Сохраняет категорию и выводит форму с сообщением об успешной операции
     *
     * POST /admin/article/store
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        self::checkAdmin();

        Category::create($request->all());

        return view('admin.category.create')->with([
            'categories' => self::showCategories(),
            'message' => 'Категория успешно создана.',
        ]);
    }

    /**
     * Выводит форму для редактирования статьи
     *
     * GET /admin/category/update/{id}
     *
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        self::checkAdmin();

        $article = Category::find($id)->first();

        return view('admin.category.update')->with([
            'article' => $article,
            'categories' => $this->showCategories(),
        ]);
    }

    /**
     * Редактирует категорию
     *
     * POST /admin/category/update
     *
     * @param $id
     *
     * @return $this
     */
    public function update($id)
    {
        self::checkAdmin();

        $category = (new Category)->find($id)
            ->first();

        return view('admin.category.update')->with([
            'article' => $category,
            'categories' => $this->showCategories(),
        ]);
    }

    /**
     * Удаляет категорию
     *
     * DELETE /admin/category/delete/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        self::checkAdmin();

        Category::find($id)
            ->first()
            ->delete();

        return redirect()->back();
    }


    /**
     * Удаляет категорию
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

        Category::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back();
    }

}
