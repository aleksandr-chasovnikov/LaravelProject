<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Article extends Model
{    
  protected $dates = ['created_at', 'updated_at'];

    /**
     * Определяет необходимость отметок времени для модели
     * @var bool
     */
    public $timestamps = false;
    //
    protected $fillable = ['id', 'title', 'alias', 'description', 'text', 'categories_id', 'users_id'];

    /**
	 * Получить пользователя - владельца данной статьи
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

    /**
     * Получить все комментарии пользователя.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
