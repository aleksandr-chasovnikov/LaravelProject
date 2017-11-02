<?php

namespace App;

use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property integer   $id
 * @property string    $title
 * @property string    $content
 * @property integer   $user_id
 * @property string    $description
 * @property integer   $viewed
 * @property string    $keywords
 * @property string    $meta_desc
 * @property integer   $categories_id
 * @property boolean   $status
 *
 * @property integer   $created_at
 * @property integer   $update_at
 *
 * @property User[]    $user
 * @property Comment[] $comments
 * @property Tag[]     $tags
 * @property File[]    $files
 */
class Article extends BaseModel
{
    use DatePresenter; // работает с датами

    const TABLE_NAME = 'articles';

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
     * Возращает владельца данной статьи
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Возращает все комментарии статьи.
     *
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

    /**
     * Возращает все файлы к статье.
     *
     * @return MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'target');
    }

    /**
     * Возращает категорию данной статьи.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    /**
     * Возращает тэги статьи.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            ArticleTag::TABLE_NAME/*,
            'article_id',
            'tag_id'*/
        );
    }
}
