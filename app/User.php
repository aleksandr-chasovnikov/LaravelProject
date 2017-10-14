<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $email
 * @property string  $password
 * @property string  $role
 * @property integer $rememberTokenName
 *
 * @property integer $created_at
 * @property integer $update_at
 */
class User extends Authenticatable
{
    use Notifiable;

    const TABLE_NAME = 'users';

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'role',
        'remember_token',
    ];

//    /**
//     * Возращает все статьи пользователя.
//     *
//     * @return HasMany
//     */
//    public function articles()
//    {
//        return $this->hasMany(Article::class, 'user_id');
//    }
//
//    /**
//     * Возращает все комментарии пользователя.
//     *
//     * @return HasMany
//     */
//    public function comments()
//    {
//        return $this->hasMany(Comment::class, 'user_id');
//    }

}
