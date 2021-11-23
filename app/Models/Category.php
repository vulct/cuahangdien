<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $meta_title
 * @property string $slug
 * @property int $parent_id
 * @property string|null $keyword
 * @property string|null $icon
 * @property string|null $description
 * @property string|null $image
 * @property int $type
 * @property int $active
 * @property int $top
 * @property int $isDelete
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Post[] $posts
 * @property-read int|null $posts_count
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereActive($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereIcon($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereImage($value)
 * @method static Builder|Category whereIsDelete($value)
 * @method static Builder|Category whereKeyword($value)
 * @method static Builder|Category whereMetaTitle($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereTop($value)
 * @method static Builder|Category whereType($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Builder
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_title',
        'slug',
        'parent_id',
        'keyword',
        'icon',
        'description',
        'image',
        'active',
        'type',
        'top',
        'isDelete'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
