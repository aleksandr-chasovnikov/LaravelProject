<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Article;

class Comment extends Model
{
	/**
	 * Получить пользователя - владельца данного комментария
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Получить статью - владельца данного комментария
	 */
	public function articles()
	{
		return $this->belongsTo(Article::class);
	}
}
