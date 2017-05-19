<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class SiteController extends Controller
{
    /**
     * Action для главной страницы
     */
	public function index()
	{
        //Список статей
        $articles = Article::select(['id', 'title', 'description'])->paginate(7);

        //Список категорий
        $categories = Category::select(['id', 'name_category'])->get();

        return view('index')->with(['articles' => $articles, 'categories' => $categories]);
	}

}
