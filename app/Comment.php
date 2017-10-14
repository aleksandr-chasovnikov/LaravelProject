<?php

namespace App;

use Faker\Provider\Base;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $target_id
 * @property string  $target_type
 * @property integer $user_id
 * @property string  $content
 * @property integer $level
 * @property integer $status
 *
 * @property integer $created_at
 * @property integer $update_at
 */
class Comment extends BaseModel
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
    protected $guarded = [];

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
