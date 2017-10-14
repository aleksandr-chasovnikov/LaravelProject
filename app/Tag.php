<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property string  $title
 * @property boolean $status
 */
class Tag extends BaseModel
{
    const TABLE_NAME = 'tags';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

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
