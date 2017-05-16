<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class AdminController extends Controller
{
	protected static $class;

	public function index($class)
    {
        $articles = $class::select(['id', 'title', 'description'])->get();

        // dump($articles);

        return view('page')->with(['header' => $this->header,
                    'message' => $this->message,
                    'articles' => $articles
        ]);
    }
}
