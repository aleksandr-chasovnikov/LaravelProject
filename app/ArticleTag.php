<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property integer $id
 * @property integer $article_id
 * @property integer $tag_id
 */
class ArticleTag extends BaseModel
{
    const TABLE_NAME = 'article_tag';

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

    /**
     * Возращает статью, владеющую данным тегом
     *
     * @return HasOne
     */
    public function article()
    {
        return $this->hasOne(Article::class, 'article_id');
    }
}
