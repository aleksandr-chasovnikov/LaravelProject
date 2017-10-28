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
        return view('admin/index')->with([
            'categories' => self::showCategories(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    {
        self::checkAdmin();

        return view('admin/create')->with([
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

        $category = (new Category)->find($id)
            ->first();

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
