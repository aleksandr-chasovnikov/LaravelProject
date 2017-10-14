<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $parent_id
 * @property integer $user_id
 * @property string  $content
 * @property integer $level
 * @property integer $status
 *
 * @property integer $created_at
 * @property integer $update_at
 */
class Comment extends Model
{
    use DatePresenter;

    const TABLE_NAME = 'comments';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'parent_id',
        'user_id',
        'content',
        'level',
    ];

//    /**
//     * Возращает пользователя - владельца данного комментария
//     *
//     * @return belongsTo
//     */
//    public function user()
//    {
//        return $this->belongsTo(User::class, 'user_id');
//    }
//
//    /**
//     * Возращает статью - владельца данного комментария
//     *
//     * @return belongsTo
//     */
//    public function article()
//    {
//        return $this->belongsTo(Article::class, 'article_id');
//    }
}
