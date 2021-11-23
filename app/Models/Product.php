<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $meta_title
 * @property string|null $content
 * @property string|null $description
 * @property string|null $image
 * @property string $slug
 * @property string $warranty
 * @property string $unit
 * @property string $keyword
 * @property int $active
 * @property int $isDelete
 * @property int $view
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $category_id
 * @property int|null $brand_id
 * @property-read Collection|ProductAttributes[] $attributes
 * @property-read int|null $attributes_count
 * @property-read Brand|null $brand
 * @property-read Category|null $category
 * @property-read Collection|Comment[] $reviews
 * @property-read int|null $reviews_count
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereActive($value)
 * @method static Builder|Product whereBrandId($value)
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereContent($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImage($value)
 * @method static Builder|Product whereIsDelete($value)
 * @method static Builder|Product whereKeyword($value)
 * @method static Builder|Product whereMetaTitle($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereUnit($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereView($value)
 * @method static Builder|Product whereWarranty($value)
 * @mixin Builder
 */

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "meta_title",
        "content",
        "description",
        "image",
        "slug",
        "warranty",
        "unit",
        "keyword",
        "active",
        "isDelete",
        "view",
        "category_id",
        "brand_id",
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttributes::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
