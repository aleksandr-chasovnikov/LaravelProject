<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use App\User;
use App\Article;

class Comment extends Model
{
    use DatePresenter;
    
    /**
     * Определяет необходимость отметок времени для модели
     * @var bool
     */
    // public $timestamps = false;
    // //
    protected $fillable = ['id', 'article_id', 'user_name', 'user_email', 'comm'];

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
