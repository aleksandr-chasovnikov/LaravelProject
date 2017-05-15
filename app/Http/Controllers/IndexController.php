<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class IndexController extends Controller
{
    //
    public function index()
    {
    	$header = 'Hello!';
    	$message = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, natus.';

    	$articles = Article::select(['id', 'title', 'description'])->get();

    	dump($articles);

    	return view('page')->with(['header'=>$header,
    								'message'=>$message,
    								'articles'=>$articles
    								]);
    }
}
