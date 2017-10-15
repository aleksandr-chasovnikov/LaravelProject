<?php

namespace App;

/**
 * @property integer $id
 * @property integer $target_id
 * @property string  $target_type
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
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Получить все модели, обладающие target.
     */
    public function target()
    {
        return $this->morphTo();
    }
}
