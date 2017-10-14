<?php

namespace App;

use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string  $title
 * @property string  $content
 * @property integer $user_id
 * @property string  $description
 * @property string  $keywords
 * @property string  $meta_desc
 * @property integer $categories_id
 * @property boolean $status
 *
 * @property integer $created_at
 * @property integer $update_at
 */
class Article extends BaseModel
{
    use DatePresenter;

    const TABLE_NAME = 'articles';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

//    /**
//     * Возращает пользователя - владельца данной статьи
//     *
//     * @return BelongsTo
//     */
//    public function user()
//    {
//        return $this->belongsTo(User::class, 'user_id');
//    }
//
//    /**
//     * Возращает все комментарии пользователя.
//     *
//     * @return HasMany
//     */
//    public function comments()
//    {
//        return $this->hasMany(Comment::class, 'article_id');
//    }
}
