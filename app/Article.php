<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Article extends Model
{
    //
    protected $fillable = ['title', 'alias', 'description', 'text'];
    protected $updated_at = false;
    protected $created_at = false;

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
