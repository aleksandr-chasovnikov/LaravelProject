<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\Input;

class AdminArticleController extends AdminController
{
	/**
	 * 
	 */
    public function index()
    {
        // Проверка доступа
        self::checkAdmin();

        $articles = Article::select(['id', 'title', 'description', 'created_at'])->get();

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();

        return view('admin/index')->with([
                'articles' => $articles,
                'categories' => $categories
            ]);
    }

	/**
	 * 
	 */
    public function update($id)
    {
        // Проверка доступа
        self::checkAdmin();

        $article = Article::select(['id', 'title', 'alias', 'description', 'text', 'categories_id', 'users_id'])->where('id', $id)->first();

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();

        return view('admin/update')->with([
                'article' => $article,
                'categories' => $categories
            ]);
    }

	/**
	 * 
	 */
    public function create()
    {
        // Проверка доступа
        self::checkAdmin();

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();

        $message = false;

        return view('admin/create')->with([
            'categories' => $categories,
            'message' => $message
            ]);
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        // Проверка доступа
        self::checkAdmin();

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        $data = $request->all();

        $article->fill($data);
                $article->save();

        return view('admin/create')->with([
            'categories' => $categories,
            'message' => $message
            ]);
    }

	/**
	 * 
	 */
    public function postUpdate(Request $request)
    {
        // Проверка доступа
        self::checkAdmin();
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $data = $request->all();

        $article = Article::select(['id', 'title', 'alias', 'description', 'text', 'categories_id', 'users_id'])->where('id', $request->id)->first();

        $article->fill($data);

        $article->save();

        return redirect()->back();
    }

    /**
     * Удалить комментарий
     */
    public function delete($article)
    {
        $article_tmp = Article::where('id', $article)->first();
        $article_tmp->delete();

        return redirect()->back();
    }

    /**
     * Удалить комментарий
     */
    public function uploadFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $result = $request->file->move('uploads', $filename);

        } else {
            $filename = false;
        }    

        $id = $request->id;

        \DB::table('articles')
                ->where('id', $id)
                ->update(['img' => $filename]);
            
        return redirect()->back()->with('message', 'Готово!');
    }
}
