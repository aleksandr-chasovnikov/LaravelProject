<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\View\View;

class AdminCategoryController extends BaseController
{
    //TODO Не доделаны методы данного класса
    /**
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        //TODO Не сделаны вьюхи
        return view('admin.category.index')->with([
            'categories' => self::showCategories(),
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
            'article' => $category
        ]);
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function delete($id)
    {
//        self::checkAdmin();
//
//        $category = Category::find($id);
//
//        return view('admin.category.update')->with([
//            'article' => $category
//        ]);
    }

}
