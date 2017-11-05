<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property integer $id
 * @property integer $target_id
 * @property string  $target_type
 * @property string  $path
 * @property boolean $status
 *
 * @property integer $created_at
 * @property integer $update_at
 */
class File extends BaseModel
{
    const TABLE_NAME = 'files';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Получить все модели, обладающие target.
     *
     * @return MorphTo
     */
    public function target()
    {
        return $this->morphTo();
    }
}
