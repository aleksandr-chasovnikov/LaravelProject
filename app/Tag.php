<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
