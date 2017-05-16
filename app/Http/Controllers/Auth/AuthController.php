<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Article;

class AuthController extends Controller
{
	/**
	 * 
	 */
	public function getLogin()
	{
		return view('auth/login');
	}
	
	/**
	 * 
	 */
	public function postLogin()
	{
        $this->validate($request, [
            'title' => 'required|max:255',
            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        $data = $request->all();

        $article = new Article;
        $article->fill($data);

        $article->save();

        return redirect('/');
	}
	
	/**
	 * 
	 */
	public function getRegister()
	{
		return view('auth/register');
	}

	/**
	 * 
	 */
	public function postRegister()
	{
        $this->validate($request, [
            'title' => 'required|max:255',
            'alias' => 'required|unique:articles,alias',
            'text' => 'required',
        ]);

        $data = $request->all();

        $article = new Article;
        $article->fill($data);

        $article->save();

        return redirect('/');
	}
}