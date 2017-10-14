<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BaseModel extends Model
{
    /**
     * Возращает пользователя - владельца данного комментария
     *
     * @return belongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Возращает все статьи к данной категории.
     */
    protected function articles()
    {
        return $this->hasMany(Article::class, 'article_id');
    }

    /**
     * Возращает статью - владельца данного комментария
     *
     * @return belongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    /**
     * Возращает все комментарии пользователя.
     *
     * @return HasMany
     */
    protected function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    /**
     * Возращает все комментарии пользователя.
     *
     * @return HasOne
     */
    protected function tag()
    {
        return $this->hasOne(Tag::class, 'tag_id');
    }
}
