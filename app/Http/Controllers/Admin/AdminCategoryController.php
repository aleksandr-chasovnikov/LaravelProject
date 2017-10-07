<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Category;
use Illuminate\View\View;

class AdminCategoryController extends AdminController
{
    //TODO Не доделаны методы данного класса
    /**
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        $categories = Category::all();

        //TODO Не сделаны вьюхи
        return view('admin/index')->with([
            'articles' => $categories
        ]);
    }

    /**
     * @return View
     */
    public function create()
    {
        // Проверка доступа
        self::checkAdmin();

        return view('admin/create');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        // Проверка доступа
//        self::checkAdmin();
//
//        $this->validate($request, [
//            'title' => 'required|max:255',
//            'alias' => 'required|unique:articles,alias',
//            'text' => 'required',
//        ]);
//
//        $data = $request->all();
//
//        $article = new Article;
//        $article->fill($data);
//
//        $article->save();
//
//        return redirect('admin/index');
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function update($id)
    {
        self::checkAdmin();

        $category = Category::find($id);

        return view('admin/update')->with([
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
//        return view('admin/update')->with([
//            'article' => $category
//        ]);
    }

}
