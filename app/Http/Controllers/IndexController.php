<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class IndexController extends Controller
{
    //

    protected $message;
    protected $header;

    public function __construct()
    {
    	$this->header = 'Hello!';
    	$this->message = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, natus.';
    }

    public function index()
    {
    	$articles = Article::select(['id', 'title', 'description'])->get();

    	// dump($articles);

    	return view('page')->with(['header'=>$this->header,
    								'message'=>$this->message,
    								'articles'=>$articles
    								]);
    }

    public function show($id)
    {
    	// $article = Article::find($id);
    	$article = Article::select(['id', 'title', 'text'])->where('id',$id)->first();

    	// dump($article);

    	return view('article-content')->with(['header'=>$this->header,
			    								'message'=>$this->message,
			    								'article'=>$article
			    								]);
    }

    public function add()
    {
    	return view('add-content')->with(['header'=>$this->header,
		    								'message'=>$this->message,
		    								]);
}

    public function store(Request $request)
    {
    	$this->validate($request, [

			'title' => 'required|max:255',
			'alias' => 'required|unique:articles,alias',
			'text' => 'required',
    	]);

    	$data = $request->all();

    	$article =new Article;
    	$article->fill($data);

    	$article->save();

    	return redirect('/');
    }
}
