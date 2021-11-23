<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $name
 * @property string|null $meta_title
 * @property string|null $description
 * @property string $content
 * @property string|null $image
 * @property string $slug
 * @property string|null $keyword
 * @property int $active
 * @property int $isDelete
 * @property int $view
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $category_id
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereView($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_title',
        'description',
        'content',
        'image',
        'slug',
        'keyword',
        'active',
        'isDelete',
        'view',
        'category_id'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
